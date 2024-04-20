<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\Course;
use App\Models\Grade;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::all();
        for ($i = 0; $i < count($lessons); $i++) {

            $lessons[$i]['course'] = $lessons[$i]->course;
            $lessons[$i]['assessment'] = $lessons[$i]->assessment;
        }

        return view('lessons.index', [
            'lessons' => $lessons,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lessons.create', [
            'assessments' => Assessment::all(),
            'courses' => Course::all()
        ]);
    }


    public function  createLesson($course_id)
    {
        return view('lessons.create', [
            'assessments' => Assessment::all(),
            'courses' => Course::all(),
            'course_id' => $course_id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->all();

        Lesson::create($input);

        return redirect('courses/' . $input['course_id'])->with('flash_message', 'Lesson Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = Lesson::find($id);
        return view('lessons.show', [
            'lesson' => $lesson
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lesson = Lesson::find($id);
        return view('lessons.edit', [
            'lesson' => $lesson,
            'grades' => Grade::all(),
            'assessments' => Assessment::all(),
            'courses' => Course::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lesson = Lesson::find($id);
        $input = $request->all();
        $lesson->update($input);
        return redirect('courses/' . $input['course_id'])->with('flash_message', 'Lesson Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lesson::destroy($id);
        return redirect('lessons')->with('flash_message', 'Lesson deleted!');
    }
}
