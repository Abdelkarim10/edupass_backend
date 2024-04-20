<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactUsForm;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Extension\Table\Table;

class OthersController extends Controller
{


    public function aboutUs()
    {
        $b = "Hakuna batata";
        return $b;
    }
    public function contactUs(Request $request)
    {

        $id = Auth::id();

        ContactUsForm::create([
            "title" => $request->input("title"),
            "content" => $request->input("content"),
            "user_id" => $id
        ]);

        return Response([
            'status_code' => "Submitted Successfuly"
        ], 201);
    }

    // get countries
    public function getCountries()
    {
        $countries = \App\Models\Country::all();
        return $countries;
    }

    // get governorates
    public function getGovernorates($country_id)
    {
        $governorates = \App\Models\Governorate::where("country_id", $country_id)->get();
        return $governorates;
    }

    // get districts
    public function getDistricts($governorate_id)
    {
        $districts = \App\Models\District::where("governorate_id", $governorate_id)->get();
        return $districts;
    }

    // get cities
    public function getCities($district_id)
    {
        $cities = \App\Models\City::where("district_id", $district_id)->get();
        return $cities;
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
        //
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
        //
    }
}
