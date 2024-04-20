<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $users = [
            [
                'id' => 1,
                'full_name' => "Admin",
                'email' => 'admin@vagary.tech',
                'password' => bcrypt("password"),
                'phone_number' => "+96176788745",
                'country_id' => 97,
                'governorate_id' => 1,
                'district_id' => 1,
                'city_id' => 1,
                'nationality_id' => 97,
                'school' => "iman",
                'grade_id' => 1,
                'role_id' => 1,
                'date_of_birth' =>  Carbon::parse('2002-5-19')
            ],

            [
                'id' => 2,
                'full_name' => "Admin_2",
                'email' => 'bassamelabid@vagary.tech',
                'password' => bcrypt("password"),
                'phone_number' => "+961767887455",
                'country_id' => 97,
                'governorate_id' => 1,
                'district_id' => 1,
                'city_id' => 1,
                'nationality_id' => 97,
                'school' => "islah",
                'grade_id' => 2,
                'role_id' => 2,
                'date_of_birth' =>  Carbon::parse('2000-5-24')
            ],
            [
                'id' => 3,
                'full_name' => "Admin_3",
                'email' => 'bassamoelabid@gmail.com',
                'password' => bcrypt("password"),
                'phone_number' => "+9617678874555",
                'country_id' => 97,
                'governorate_id' => 1,
                'district_id' => 1,
                'city_id' => 1,
                'nationality' => 97,
                'school' => "islah",
                'grade_id' => 2,
                'role_id' => 2,
                'date_of_birth' =>  Carbon::parse('2000-5-24')
            ]
        ];
        $user->insert($users);
    }
}
