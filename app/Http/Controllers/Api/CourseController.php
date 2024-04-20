<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Admin\GradesController;
use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\AssessmentTaken;
use App\Models\Course;
use App\Models\Grade;
use App\Models\Lesson;
use App\Models\McqsTaken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{


    public function getCourseList(Request $request)
    {
        $user = Auth::user();

        $courses = Course::where("grade_id", $user->grade_id)->get();

        for ($i = 0; $i < count($courses); $i++) {
            if($courses[$i]->course_pic != null){
                $courses[$i]['course_pic'] = env('url') . "/public/assets/course_pics/" . $courses[$i]->course_pic;
            }
        }

        return ;
    }

    public function singleCourse($id)
    {

        $course = Course::findOrFail($id);

        $lessons = $course->lessons()->get();
        $assessment = $course->assessment;


        return [
            "lessons" => $lessons,
            "assessment" => $assessment
        ];
    }


    //list of grades
    public function getGrades()
    {
        $grades = Grade::all();

        return $grades;
    }


}
