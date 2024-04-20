<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function singlelesson($id)
    {

        $lesson = Lesson::findOrFail($id);

        $pdfs = $lesson->pdfs()->get();
        $assessment =  $lesson->assessment;
        $videos =  $lesson->videos()->get();

        for ($i = 0; $i < count($pdfs); $i++) {
            if($pdfs[$i]->pdf != null){
                $pdfs[$i]['pdf'] = env('url') . "/public/assets/pdfs/" . $pdfs[$i]->pdf;
            }
        }

        return [
            "Pdf" => $pdfs,
            "Assessment" => $assessment,
            "Videos" => $videos,

        ];
    }

    public function search($key)
    {

        $lessons = Lesson::where('name', "LIKE","%" . $key . "%")->get();

        return $lessons;

    }
}
