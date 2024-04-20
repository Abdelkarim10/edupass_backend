<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AssessmentTaken;
use Illuminate\Http\Request;

class AssessmentsTakenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assessments_taken = AssessmentTaken::all();

        for ($i = 0; $i < count($$assessments_taken); $i++) {
            $assessments_taken[$i]['user'] =  $assessments_taken[$i]->user;
            $assessments_taken[$i]['assessment'] =  $assessments_taken[$i]->assessment;
        }
        $assessment_taken_name = $assessment_taken->assessment->name;

        return view('assessments_taken.index', [
            'assessments_taken' => $assessments_taken,
            'user' => $user,
            'assessment_taken_name' =>  $assessment_taken_name
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assessment_taken = AssessmentTaken::find($id);

        $assessment_taken['user'] = $assessment_taken->user;
        $assessment_taken['assessment'] = $assessment_taken->assessment;

        return view('assessments_taken.show', [
            'assessment_taken' => $assessment_taken
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assessment_taken = AssessmentTaken::findOrFail($id);
        $user_id =   $assessment_taken->user->id;
        $assessment_taken->destroy($id);
        return redirect('users/' . $user_id)->with('flash_message', 'Assessment taken deleted!');
    }
}
