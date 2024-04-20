<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dictionary;
use App\Models\Lesson;
use Illuminate\Http\Request;

class DictionaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dictionaries = Dictionary::all();

        return view('dictionary.index', [
            'dictionaries' => $dictionaries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dictionary.create', [
            'lessons' => Lesson::all(),
            'dictionary' => Dictionary::all(),
        ]);
    }
    public function createLessonDict($lesson_id)
    {
        return view('dictionary.create', [

            'dictionary' => Dictionary::all(),
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
        $input = $request->all();
        $dictionary =   Dictionary::create($input);

        $dictionary->update([
            "lesson_id" => $request->input("lesson_id")
        ]);


        return redirect('lessons/' . $input["lesson_id"])->with('flash_message', 'Dictionary Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dictionaries = Dictionary::find($id);


        return view('dictionary.show', [
            'dictionaries' =>  $dictionaries,
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

        $dictionary = Dictionary::find($id);
        return view('dictionary.edit', [
            'dictionary' =>  $dictionary,


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
        $dictionary = Dictionary::find($id);
        $input = $request->all();      
        $lesson_id = $dictionary->lesson->id;
        $dictionary->update($input);
        return redirect('lessons/' . $lesson_id)->with('flash_message', 'Dictionary Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dictionary = Dictionary::findOrFail($id);
        $lesson_id = $dictionary->lesson->id;
        $dictionary->destroy($id);
        return redirect('lessons/' . $lesson_id)->with('flash_message', 'Dictionary deleted!');
    }
}
