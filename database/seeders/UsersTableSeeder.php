<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                'name' => 'Example Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('Password@123'),
                'role' => 'Admin',
            ],
            [
                'name' => 'Example User',
                'email' => 'user@example.com',
                'password' => Hash::make('Password@123'),
                'role' => 'User',
            ],
            [
                'name' => 'Example Manager',
                'email' => 'manager@example.com',
                'password' => Hash::make('Password@123'),
                'role' => 'Manager',
            ],
        ]);
    }
}
