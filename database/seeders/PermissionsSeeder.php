<?php

namespace Database\Seeders;

use App\Models\Pdf;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = new Permission();

        $permissions = [
            [
                'id' => 1,
                'minimum_rank' => 1,
            ],

            [
                'id' => 2,
                'minimum_rank' => 2,
            ]



        ];
        $permission->insert($permissions);
    }
}
