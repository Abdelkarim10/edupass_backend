<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course = new Course();

        $courses = [
            [
                'id' => 1,
                'name' => "Math",
                'grade_id' => 1,


            ],

            [
                'id' => 2,
                'name' => "Physics",
                'grade_id' => 2,

            ]



        ];
        $course->insert($courses);
    }
}
