<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PdfsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pdfs = Pdf::all();
        return view('pdfs.index', [
            'pdfs' => $pdfs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pdfs.create', [
            "pdfs" => Pdf::all(),
            "lessons" => Lesson::all()
        ]);
    }
    public function createLessonPdf($lesson_id)
    {
        return view('pdfs.create', [

            'pdfs' => Pdf::all(),
            'lesson_id' => $lesson_id

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

        $image = $request->file('pdf');


        $imageName = time() . '.' . $request->input("file_name") . ".pdf";

        Pdf::create([
            "file_name" => $request->input("file_name"),
            "pdf" => $imageName,
            "lesson_id" => $request->input("lesson_id"),
        ]);


        $destinationPath = public_path('/assets/pdfs/');


        $image->move($destinationPath, $imageName);


        // dd("batata");

        return redirect('lessons/' . $request->input("lesson_id"))->with('flash_message', 'Pdf Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pdf = Pdf::find($id);

        return redirect(env('url') . '/public/assets/pdfs/' .   $pdf->pdf);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pdf = Pdf::find($id);


        return view('pdfs.edit', [

            'pdf' => $pdf,


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
        $pdf = Pdf::find($id);
        $input = $request->all();
        $pdf->update($input);
        return redirect('lessons/' . $pdf->lesson->id)->with('flash_message', 'Pdf Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $pdf = Pdf::find($id);
        $lesson_id = $pdf->lesson->id;
        $pdf->destroy($id);

        return redirect('lessons/' . $lesson_id)->with('flash_message', 'PDF deleted!');
    }
}
