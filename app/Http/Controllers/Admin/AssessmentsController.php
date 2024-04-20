<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class AssessmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assessments = Assessment::all();
        return view('assessments.index', [
            'assessments' => $assessments
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('assessments.create');
    }

    public function createCourse($course_id)
    {
        return view('assessments.create', [
            'course_id' => $course_id,

        ]);
    }


    public function  createLesson($lesson_id)
    {
        return view('assessments.create', [
            'lesson_id' => $lesson_id,

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


        $assessment = Assessment::create([
            'name' => $input['name']
        ]);

        if ($request->exists("course_id")) {

            $course = Course::findOrFail($request->input("course_id"));
            $course->update([
                "assessment_id" => $assessment->id
            ]);
            return redirect('courses/' . $request->input("course_id"))->with('flash_message', 'Assessment Added!');
        }

        if ($request->exists("lesson_id")) {
            $lesson = Lesson::findOrFail($request->input("lesson_id"));
            $lesson->update([
                "assessment_id" => $assessment->id
            ]);
            return redirect('lessons/' . $request->input("lesson_id"))->with('flash_message', 'Assessment Added!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assessment = Assessment::find($id);
        return view('assessments.show', [
            'assessment' => $assessment,
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
        $assessments = Assessment::find($id);
        return view('assessments.edit', [
            'assessment' => $assessments,

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
        $assessment = Assessment::find($id);



        $input = $request->all();
        $assessment->update($input);

        if ($assessment->course != null) {
            return redirect('courses/' . $assessment->course->id)->with('flash_message', 'Assessment Updated!');
        } else {
            return redirect('lessons/' . $assessment->lesson->id)->with('flash_message', 'Assessment Updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assessment = Assessment::find($id);

        if ($assessment->course != null) {
            $course = $assessment->course;
            $course->assessment->delete();
            $course->update([
                "assessment_id" => null
            ]);
            return redirect('courses/' . $assessment->course->id)->with('flash_message', 'assessment deleted!');
        } else {
            $lesson = $assessment->lesson;
            $lesson->assessment->delete();
            $lesson->update([
                "assessment_id" => null
            ]);
            return redirect('lessons/' . $assessment->lesson->id)->with('flash_message', 'assessment deleted!');
        }
    }
}
