<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mcq;
use Illuminate\Http\Request;

class McqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $mcqs = Mcq::all();
        for ($i = 0; $i < count($mcqs); $i++) {
            $mcqs[$i]['assessment'] = $mcqs[$i]->assessments;
            // $grade[$i]['assessment'] = $grade[$i]->assessment;
        }

        return view('mcqs.index', [
            'mcqs' => $mcqs
        ]);
    }



    public function create()
    {
        return view('mcqs.create', [
            'mcqs' => Mcq::all(),

        ]);
    }

    public function createMcq($assessment_id)
    {
        return view('mcqs.create', [
            'mcqs' => Mcq::all(),
            'assessment_id' => $assessment_id

        ]);
    }

    public function edit($id)
    {
        $mcq = Mcq::find($id);
        return view('mcqs.edit')->with('mcq', $mcq);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $requestData = $request->all();
        $mcq =  Mcq::create($requestData);
 
        if ($request->hasFile('mcq_pic')) {
 
            //////
 
            $image = $request->file('mcq_pic');
 
 
            $imageName = time() . $mcq->full_name .  '.' . $image->extension();
 
 
            $destinationPath = public_path('/assets/mcq_pics/');
 
 
            $image->move($destinationPath, $imageName);
 
            //////
 
     
 
            $mcq->update([
                "mcq_pic" => $imageName
            ]);

        }



     
        $assessment_id = $mcq->assessment->id;
        return redirect('assessments/' .     $assessment_id)->with('flash_message', 'Mcq Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mcq = Mcq::find($id);
        return view('mcqs.show', [
            'mcq' =>  $mcq,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id0
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        $mcq = Mcq::find($id);
        $input = $request->all();
        $assessment_id = $mcq->assessment->id;

        if ($request->hasFile('mcq_pic')) {
 
            //////
 
            $image = $request->file('mcq_pic');
 
 
            $imageName = time() . $mcq->full_name .  '.' . $image->extension();
 
 
            $destinationPath = public_path('/assets/mcq_pics/');
 
 
            $image->move($destinationPath, $imageName);
 
            //////
 
     
 
            $mcq->update([
                "mcq_pic" => $imageName
            ]);

        }


        $mcq->update($input);
        return redirect('assessments/' . $assessment_id)->with('flash_message', 'Mcq Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mcq = Mcq::findOrFail($id);
        $assessment_id = $mcq->assessment->id;
        $mcq->destroy($id);
        return redirect('assessments/' . $assessment_id)->with('flash_message', 'Mcq deleted!');
    }
}
