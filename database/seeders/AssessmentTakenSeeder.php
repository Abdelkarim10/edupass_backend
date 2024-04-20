<?php

namespace Database\Seeders;

use App\Models\AssessmentTaken;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssessmentTakenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assessment = new AssessmentTaken();

        $assessments_taken = [
            [
                'id' => 1,
                'assessment_id' => 1,
                "user_id" => 1
            ],

            [
                'id' => 2,
                'assessment_id' => 2,
                "user_id" => 1
            ]



        ];
        $assessment->insert($assessments_taken);
    }
}
