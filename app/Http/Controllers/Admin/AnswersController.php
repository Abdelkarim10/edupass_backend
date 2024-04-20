<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Mcq;
use Illuminate\Http\Request;

class AnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $answers = Answer::all();
        for ($i = 0; $i < count($answers); $i++) {
            $mcqs[$i]['mcq'] = $answers[$i]->mcq;
            // $grade[$i]['assessment'] = $grade[$i]->assessment;
        }

        return view('answers.index', [
            'answers' => $answers
        ]);
    }


    public function create()
    {
        return view('answers.create', [
            'answers' => Answer::all(),

        ]);
    }


    public function createAnswer($mcq_id)
    {
        return view('answers.create', [
            'answers' => Answer::all(),
            'mcq_id' =>  $mcq_id
        ]);
    }

    public function updateRightAnswer($mcq_id, Request $request)
    {

        $mcq = Mcq::findOrFail($mcq_id);
        $answers = $mcq->answers()->get();

        foreach ($answers as $a) {
            if ($a->id == $request->input("right_answer")) {
                $a->update([
                    "right_answer" => 1
                ]);
            } else {
                $a->update([
                    "right_answer" => 0
                ]);
            }
        }

        return redirect('mcqs/' . $mcq->id)->with('flash_message', 'Right Answer Updated!');
    }


    public function edit($id)
    {
        $answer = Answer::find($id);
        return view('answers.edit')->with('answer', $answer);
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
        $answer = answer::create($input);
        $mcq_id = $answer->mcq->id;
        return redirect('mcqs/' . $mcq_id)->with('flash_message', 'Answer Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $answer = answer::find($id);
        return view('answers.show', [
            'answer' =>  $answer,
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
        $Answer = Answer::find($id);
        $input = $request->all();
        $mcq_id = $Answer->mcq->id;
        $Answer->update($input);
        return redirect('mcqs/' .  $mcq_id)->with('flash_message', 'Answer Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $answer = Answer::findOrFail($id);
        $mcq_id = $answer->mcq->id;
        $answer->destroy($id);
        return redirect('mcqs/' . $mcq_id)->with('flash_message', 'Answer deleted!');
    }
}
