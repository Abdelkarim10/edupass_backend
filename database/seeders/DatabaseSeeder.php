<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([

            GradesSeeder::class,
            RolesSeeder::class,
            VideosSeeder::class,
            PermissionsSeeder::class,
            PdfsSeeder::class,
            McqsSeeder::class,
            CoursesSeeder::class,
            AssessmentsSeeder::class,
            AnswersSeeder::class,
            LessonsSeeder::class,
            AssessmentTakenSeeder::class,
            McqsTakenSeeder::class,
            ChatSeeder::class,
            CountrySeeder::class,
            UserSeeder::class,
            PartnersSeeder::class,
            SponsorSeeder::class
        ]);
    }
}
