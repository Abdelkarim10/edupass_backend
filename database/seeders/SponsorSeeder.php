<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Sponsors = [
            [
                'id' => 1,
                'name' => "awwal sponsor",
                'description' => "ahla description sponsor",
                'link' =>  "chi youtube link"

            ],

            [
                'id' => 2,
                'name' => "teni sponsor",
                'description' => "ahla teniii description sponsor",
                'link' =>  "chi youtube link teni"

            ]





        ];
        Sponsor::insert($Sponsors);
    }
}
