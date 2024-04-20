<?php

namespace Database\Seeders;

use App\Models\Assessment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssessmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assessment = new Assessment();

        $assessments = [
            [
                'id' => 1,
                'name' => "midterm",
            ],

            [
                'id' => 2,
                'name' => "final",
            ],

            [

                'id' => 3,
                'name' => "quiz",
            ]


        ];
        $assessment->insert($assessments);
    }
}
