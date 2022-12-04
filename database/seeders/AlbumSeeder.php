<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Artist;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $artists = Artist::all();

        $faker = Factory::create();
        foreach ($artists as $artist) {
            $number = rand(0, 3);
            while ($number-- > 0) {
                Album::create([
                    'name' => $faker->catchPhrase(),
                    'year' => rand(1990, date('Y')),
                    'artist_id' => $artist->id,
                ]);
            }
        }

    }
}
