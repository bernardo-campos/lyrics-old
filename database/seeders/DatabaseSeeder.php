<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // any enviroment
        $this->call([
            //
        ]);

        // only LOCAL enviroment
        if (App::environment('local')) {
            $this->call([
                UserSeeder::class,
            ]);
        }
    }
}
