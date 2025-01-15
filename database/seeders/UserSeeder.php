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
            'name' => 'Mr.Aceng Taofik s.Kom',
            'email' => 'kurikulum@gmail.com',
            'password' => bcrypt('12345678'), // Ganti password sesuai kebutuhan
            'role' => 'kurikulum',
        ]);

        User::create([
            'name' => 'Pak Yanto s.Kom',
            'email' => 'guru@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'guru', // Role untuk guru
        ]);
    }
}
