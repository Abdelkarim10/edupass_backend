<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::all();
        return view('partners.index', [
            'partners' => $partners
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partners.create', [
            "partners" => Partner::all(),
            
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
        $partner =  Partner::create($requestData);

        $image = $request->file('image');
        $imageName = time() . $partner->full_name .  '.' . $image->extension();
        $destinationPath = public_path('/assets/partners_pics');
        $image->move($destinationPath, $imageName);

        $partner->update([
            "image" => $imageName
        ]);
        
        return redirect('/partners')->with('flash_message', 'Partner  Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $partner = Partner::find($id);
        return view('partners.show', [
            'partner' => $partner
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
        $partner = Partner::find($id);


        return view('partners.edit', [

            'partner' => $partner,


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
       $partner = Partner::find($id);
        $input = $request->all();
        $partner->update($input);
        return redirect('/partners')->with('flash_message', 'Partner Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partners = Partner::findOrFail($id);
       
        $partners->destroy($id);
        return redirect('/partners')->with('flash_message', 'Partner deleted!');
    }
}
