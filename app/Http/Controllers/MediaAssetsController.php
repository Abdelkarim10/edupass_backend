<?php

namespace App\Http\Controllers;

use App\Models\MediaAssets;
use App\Http\Requests\StoreMediaAssetsRequest;
use App\Http\Requests\UpdateMediaAssetsRequest;

class MediaAssetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMediaAssetsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMediaAssetsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MediaAssets  $mediaAssets
     * @return \Illuminate\Http\Response
     */
    public function show(MediaAssets $mediaAssets)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MediaAssets  $mediaAssets
     * @return \Illuminate\Http\Response
     */
    public function edit(MediaAssets $mediaAssets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMediaAssetsRequest  $request
     * @param  \App\Models\MediaAssets  $mediaAssets
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMediaAssetsRequest $request, MediaAssets $mediaAssets)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MediaAssets  $mediaAssets
     * @return \Illuminate\Http\Response
     */
    public function destroy(MediaAssets $mediaAssets)
    {
        //
    }
}
