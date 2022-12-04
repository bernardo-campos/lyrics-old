<?php

namespace Database\Seeders;

use App\Models\Artist;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        Artist::create(['name' => $faker->name()]);
        Artist::create(['name' => $faker->name()]);
        Artist::create(['name' => $faker->name()]);
    }
}
