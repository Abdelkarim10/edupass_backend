<?php

namespace Database\Seeders;

use App\Models\Mcq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class McqsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mcq = new Mcq();

        $mcqs = [
            [
                'id' => 1,
                'question' => "Question 1?",
                'assessment_id' => 1,
            ],

            [
                'id' => 2,
                'question' => "Question 2?",
                'assessment_id' => 1,
            ]



        ];
        $mcq->insert($mcqs);
    }
}
