<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminInfo extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'sellcars',
                'email' => 'admin@arieleagency.com',
                'role' => 'Admin',
                'password' => Hash::make('arieleagency44##')
            ]
        ]);
    }
}
