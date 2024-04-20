<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $grades = [

            [
                'id' => 1,
                'name' => "grade 6",
            ],

            [
                'id' => 2,
                'name' => "grade 7",
            ]


        ];
        foreach ($grades as $grade) {
            Grade::create($grade);
        }
    }
}
