<?php

namespace App\Console\Commands;

use App\Models\Artist;
use Illuminate\Console\Command;

class SeedProduction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:production';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Persists JSON files into database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $dir = base_path("database/seeders/production");

        $filenames = scandir($dir);

        // TODO: iterate until count($filenames)
        $bar = $this->output->createProgressBar(count($filenames) - 2);
        $bar->start();

        for ($i = 2; $i < count($filenames); $i++) {

            // TODO: add content example to README.md
            $artistArray = json_decode(file_get_contents( $dir."\\".$filenames[$i] ));

            $artist = Artist::create(['name' => $artistArray->name]);

            if ( !isset($artistArray->albums) ) {
                $this->error("skipping " . $filenames[$i] . " ('name' is not set)");
            }

            foreach($artistArray->albums as $album) {

                $createdAlbum = $artist->albums()->create([
                    'name' => ucfirst(mb_strtolower($album->title)),
                    'year' => $album->year
                ]);

                foreach($album->songs as $song) {
                    $createdAlbum->songs()->create([
                        'name'=> isset($song->title) ? ucfirst(mb_strtolower(($song->title))) : '',
                        'lyric' => isset($song->lyric) ? trim($song->lyric): '',
                    ]);
                }

            }

            $bar->advance();
        }

        $bar->finish();
    }
}
