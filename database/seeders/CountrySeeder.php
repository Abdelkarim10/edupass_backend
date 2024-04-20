<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\District;
use App\Models\Governorate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {




        $countries = file_get_contents(storage_path() ."/H_Countries_list.json");
        $governorates = file_get_contents(storage_path() ."/H_Lebanon_Governorates.json");
        $districts = file_get_contents(storage_path() ."/H_Lebanon_Districts.json");
        $cities = file_get_contents(storage_path() ."/H_Lebanon_Locations.json");

        $countries = json_decode($countries,true);
        $governorates = json_decode($governorates,true);
        $districts = json_decode($districts,true);
        $cities = json_decode($cities,true);

//        countries::truncate();
//        governorates::truncate();
//        districts::truncate();
//        cities::truncate();

        for($i = 0;$i < count($countries);$i++){
            $country = $countries[$i];
            Country::create([
                'id' => $country['id'],
                'name' => $country['name'],
            ]);
            for($j = 0;$j < count($governorates);$j++){
                $governorate = $governorates[$j];

                if($governorate['country_id'] == $country['id']){
                    Governorate::create([
                        'id' => $j+1,
                        'name' => $governorate['name'],
                        'country_id' => $country['id'],
                    ]);
                    for($k = 0;$k < count($districts);$k++){
                        $district = $districts[$k];

                        if($district['parent_id'] == $governorate['id']){
                            District::create([
                                'id' => $k+1,
                                'name' => $district['name'],
                                'governorate_id' => $j+1,
                            ]);
                            for($l = 0;$l < count($cities);$l++){
                                $city = $cities[$l];

                                if($city['parent_id'] == $district['id']){
                                    City::create([
                                        'id' => $l+1,
                                        'name' => $city['name'],
                                        'district_id' => $k+1,
                                    ]);
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
