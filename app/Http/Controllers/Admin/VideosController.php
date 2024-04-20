<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Video;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::all();
        return view('videos.index', [
            'videos' =>  $videos

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('videos.create', [
            "videos" => Video::all(),
            "lessons" => Lesson::all()
        ]);
    }

    public function createVideo($lesson_id)
    {
        return view('videos.create', [
            "videos" => Video::all(),
            "lesson_id" => $lesson_id
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
      $video =  Video::create($input);
        $lesson_id = $video->lesson->id;
        return redirect('lessons/' .  $lesson_id)->with('flash_message', 'Video Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Video::find($id);
        return view('videos.show', [
            'video' => $video,
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
        $video = Video::find($id);
       
        return view('videos.edit')->with('video', [
            'video' =>  $video,


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
        $video = Video::find($id);
        $input = $request->all();
        $video->update($input);
        return redirect('videos')->with('flash_message', 'video Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $video = Video::findOrFail($id);
        $lesson_id = $video->lesson->id;
        $video->destroy($id);
        return redirect('lessons/' .  $lesson_id)->with('flash_message', 'video deleted!');
    }
}
