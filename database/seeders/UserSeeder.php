<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'kurikulum',
            'email' => 'kurikulum@gmail.com',
            'password' => bcrypt('12345678'), // Ganti password sesuai kebutuhan
            'role' => 'kurikulum',
        ]);

        User::create([
            'name' => 'guru',
            'email' => 'guru@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'guru', // Role untuk guru
        ]);
    }
}
