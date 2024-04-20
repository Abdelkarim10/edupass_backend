<?php

namespace Database\Seeders;

use App\Models\Chat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use phpDocumentor\Reflection\PseudoTypes\False_;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chat = new Chat();

        $chats = [
            [
                "id" => 4,
                'title' => "Answer 1",
                'assistant_id' => 1,
                'user_id' => 1,
                'question_answered' => true,
            ],
            [
                "id" => 31,
                'title' => "Answer 2",
                'assistant_id' => 3,
                'user_id' => 4,
                'question_answered' => false,
            ],

            [
                "id" => 88,
                'title' => "Answer 3",
                'assistant_id' => 4,
                'user_id' => 3,
                'question_answered' => false,
            ]


        ];
        $chat->insert($chats);
    }
}
