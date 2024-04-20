<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $partners = [
            [
                'id' => 1,
                'name' => "m3allem",
                'description' => "ahla description",
                'link' =>  "ajsfghsdajavf"

            ],

            [
                'id' => 2,
                'name' => "kimo",
                'description' => "ahla teniii description",
                'link' =>  "ajsfghjsadavf"

            ]





        ];
        Partner::insert($partners);
    }
}
