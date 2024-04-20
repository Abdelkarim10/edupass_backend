<?php

namespace Database\Seeders;

use App\Models\McqsTaken;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class McqsTakenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mcq = new McqsTaken();

        $mcqs = [

            [
                'id' => 1,
                'mcq_id' => 1,
                'answer_id' => 1,
                'assessment_taken_id' => 1
            ],

            [
                'id' => 2,
                'mcq_id' => 2,
                'answer_id' => 4,
                'assessment_taken_id' => 1
            ]

        ];
        $mcq->insert($mcqs);
    }
}
