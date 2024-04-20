<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\Course;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\Count;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $courses = Course::all();

        for ($i = 0; $i < count($courses); $i++) {
            $courses[$i]['grade'] = $courses[$i]->grade;
            $courses[$i]['assessment'] = $courses[$i]->assessment;
        }
        $course_assessment = $courses[$i]['assessment'] = $courses[$i]->assessment;
        return view('courses.index', [
            'courses' => $courses,
            'course_assessments' => $course_assessment
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create', [
            'grades' => Grade::all(),
            'assessments' => Assessment::all(),
        ]);
    }
    public function createGradeCourse($grade_id)
    {
        return view('courses.create', [
            'grade' => Grade::findOrFail($grade_id),
            'assessments' => Assessment::all(),
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

        //////

        $requestData = $request->all();
        $course =  Course::create($requestData);

        if ($request->hasFile('course_pic')) {

            //////

            $image = $request->file('course_pic');


            $imageName = time() . $course->full_name .  '.' . $image->extension();


            $destinationPath = public_path('/assets/course_pics/');


            $image->move($destinationPath, $imageName);

            //////



            $course->update([
                "course_pic" => $imageName
            ]);
        }




        ///////


        return redirect('grades/' . $input["grade_id"])->with('flash_message', 'Course Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);

        $course['grade'] = $course->grade;
        $course['assessment'] = $course->assessment;

        return view('courses.show', [
            'course' => $course
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
        $course = Course::find($id);
        return view('courses.edit', [
            'course' => $course,
            'grades' => Grade::all(),
            'assessments' => Assessment::all(),
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
        // $grade = Grade::find($id);
        $course = Course::find($id);
        $input = $request->all();
        $grade_id = $course->grade->id;


        if ($request->hasFile('course_pic')) {

            //////

            $image = $request->file('course_pic');


            $imageName = time() . $course->full_name .  '.' . $image->extension();


            $destinationPath = public_path('/assets/course_pics/');


            $image->move($destinationPath, $imageName);

            //////



            $course->update([
                "course_pic" => $imageName
            ]);
        }


        $course->update($input);
        // $grade->update($input);
        return redirect('grades/' . $grade_id)->with('flash_message', 'Course Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $grade_id =   $course->grade->id;
        $course->destroy($id);
        return redirect('grades/' . $grade_id)->with('flash_message', 'Course deleted!');
    }
}
