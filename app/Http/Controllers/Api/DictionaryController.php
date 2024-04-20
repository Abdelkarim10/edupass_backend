<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dictionary;
use Illuminate\Http\Request;

class DictionaryController extends Controller
{
    public function index($lesson_id)
    {
        $dictionaries = Dictionary::where("lesson_id",$lesson_id)->get();

        return  $dictionaries;
    }
}
