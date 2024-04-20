<?php

namespace Database\Seeders;

use App\Models\Dictionary;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DictionarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dict = new Dictionary();

        $dicts = [

            [
                'id' => 1,
                'word' => "Word 1",
                'meaning' => "Meaning of 'word 1'",
                'lesson_id' => 1
            ],
            [
                'id' => 2,
                'word' => "Word 2",
                'meaning' => "Meaning of 'word 2'",
                'lesson_id' => 1
            ],
            [
                'id' => 3,
                'word' => "Word 3",
                'meaning' => "Meaning of 'word 3'",
                'lesson_id' => 2
            ],

            [
                'id' => 4,
                'word' => "Word 4",
                'meaning' => "Meaning of 'word 4'",
                'lesson_id' => 2

            ],


        ];

        $dict->insert($dicts);
    }
}
