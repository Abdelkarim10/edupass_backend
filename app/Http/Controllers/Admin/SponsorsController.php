<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sponsors = Sponsor::all();
        return view('sponsors.index', [
            'sponsors' => $sponsors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sponsors.create', [
            "sponsors" => Sponsor::all(),

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
        $requestData = $request->all();
        $sponsor =  Sponsor::create($requestData);

        $image = $request->file('image');
        $imageName = time() . $sponsor->full_name .  '.' . $image->extension();
        $destinationPath = public_path('/assets/sponsors_pics');
        $image->move($destinationPath, $imageName);

        $sponsor->update([
            "image" => $imageName
        ]);

        return redirect('/sponsors')->with('flash_message', 'Sponsor  Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sponsor = Sponsor::find($id);
        return view('sponsors.show', [
            'sponsor' => $sponsor
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
        $sponsor = Sponsor::find($id);


        return view('sponsors.edit', [

            'sponsor' => $sponsor,


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
        $sponsor = Sponsor::find($id);
        $input = $request->all();
        $sponsor->update($input);
        return redirect('/sponsors')->with('flash_message', 'Sponsor Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sponsors = Sponsor::findOrFail($id);

        $sponsors->destroy($id);
        return redirect('/sponsors')->with('flash_message', 'Sponsor deleted!');
    }
}
