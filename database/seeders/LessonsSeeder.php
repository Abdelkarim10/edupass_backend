<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lesson = new Lesson();

        $lessons = [
            [
                'id' => 1,
                'name' => "water",
                'course_id' => 1,
                'assessment_id' => 1,
            ],

            [
                'id' => 2,
                'name' => "fire",
                'course_id' => 2,
                'assessment_id' => 2,
            ]



        ];
        $lesson->insert($lessons);
    }
}
