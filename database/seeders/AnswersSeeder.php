<?php

namespace Database\Seeders;

use App\Models\Answer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use phpDocumentor\Reflection\PseudoTypes\True_;

class AnswersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $answer = new Answer();

        $answers = [
            [
                "id" => 1,
                'text' => "Answer 1",
                'mcq_id' => 1,
                'right_answer' => True,
            ],
            [
                "id" => 2,
                'text' => "Answer 2",
                'mcq_id' => 1,
                'right_answer' => false,
            ],

            [
                "id" => 3,
                'text' => "Answer 3",
                'mcq_id' => 2,
                'right_answer' => True,
            ],
            [
                "id" => 4,
                'text' => "Answer 4",
                'mcq_id' => 2,
                'right_answer' => false,
            ],

            [
                "id" => 5,
                'text' => "Answer 5",
                'mcq_id' => 2,
                'right_answer' => False,
            ]



        ];
        $answer->insert($answers);
    }
}
