<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $video = new Video();

        $videos = [
            [
                'id' => 1,
                'link' => "https://www.youtube.com/watch?v=PZ7lDrwYdZc&t=4s",
                'lesson_id' => 1,
            ],

//            [
//                'id' => 2,
//                'link' => "https://www.youtube.com/watch?v=wigeep90mpA",
//                'lesson_id' => 2,
//            ]



        ];
        $video->insert($videos);
    }
}
