<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Song;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SongSeeder extends Seeder
{
    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create();
    }

    private function createLyric()
    {
        return implode("\n<br>", $this->faker->sentences(rand(10, 24)) );
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $albums = Album::all();

        foreach ($albums as $album) {
            $number = rand(1, 10);
            for ($i=1; $i <= $number; $i++) {
                Song::create([
                    // 'number' => $i,
                    'album_id' => $album->id,
                    'name' => $this->faker->catchPhrase(),
                    'lyric' => $this->createLyric(),
                ]);
            }
        }
    }
}
