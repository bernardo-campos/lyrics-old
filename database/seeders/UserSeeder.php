<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => '$2y$10$mX6g0pmQonBFC.MDfYC7J.PopmCfTrufWQ2qUDyVZXklYkfSe7irm',
            'email_verified_at' => now(),
        ]);
    }
}
