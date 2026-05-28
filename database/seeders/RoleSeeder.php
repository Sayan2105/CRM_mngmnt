<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $roles = [
            ['name' => 'owner', 'slug' => 'owner'],
            ['name' => 'manager', 'slug' => 'manager'],
            ['name' => 'developer', 'slug' => 'developer'],
            ['name' => 'viewer', 'slug' => 'viewer'],
        ];

        DB::table('roles')->insert($roles);
    }
}
