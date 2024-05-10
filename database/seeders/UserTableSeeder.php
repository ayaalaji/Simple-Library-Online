<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            //manager    
            [
                'name' =>  'Manager',
                'email' => 'manager@gmail.com',
                'password' => Hash::make('123123123'),
                'role' => 'manager',
            ],
        ]);
    }
}
