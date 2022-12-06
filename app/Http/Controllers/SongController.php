<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Song;
use Illuminate\Http\Request;
use DataTables;

class SongController extends Controller
{
    /* TODO: extract to a helper or a trait */
    public function createPattern($str)
    {
        $replaces = [
            'a|à|á|A|À|Á' => '(a|à|á|A|À|Á)',
            'e|è|é|E|È|É' => '(e|è|é|E|È|É)',
            'i|ì|í|I|Ì|Í' => '(i|ì|í|I|Ì|Í)',
            'o|ò|ó|O|Ò|Ó' => '(o|ò|ó|O|Ò|Ó)',
            'u|ù|ú|U|Ù|Ú' => '(u|ù|ú|U|Ù|Ú)',
        ];
        foreach ($replaces as $key => $value) {
            $str = preg_replace("/$key/", "$value", $str);
        }
        return $str;
    }

    private function view(...$args)
    {
        $args[0] = 'models.songs.'.$args[0];
        return view(...$args);
    }

    public function index()
    {
        if (!request()->ajax()) {
            return $this->view('index');
        }

        $query = Song::with('album.artist')
            ->select(['songs.*'])
        ;

        return DataTables::eloquent($query)
            ->addColumn('urls', fn(Song $song) => [
                'edit' => route('songs.edit', $song),
                'destroy' => route('songs.destroy', $song),
            ])
            ->filterColumn('lyric', function($query, $keyword) {
                $query->orWhereRaw("MATCH (lyric) AGAINST (?)", [$keyword]);
            })
            ->editColumn('lyric', function(Song $song) {
                $keyword = isset(request()->search['value']) ? request()->search['value'] : null;
                if ($keyword) {
                    $pattern = $this->createPattern($keyword);
                    return preg_replace("/($pattern)/i", '<mark>$1</mark>', $song->lyric);
                }
                return $song->lyric;
            })
            ->make(true)
        ;
    }

    public function create()
    {
        return $this->view('create', [
            'albums' => Album::with('artist')->get(),
        ]);
    }

    public function store(Request $request)
    {
        Song::create( $request->all() );

        return to_route('songs.index')->with('success', 'Canción creada');
    }

    // public function show(Song $song)
    // {

    // }

    public function edit(Song $song)
    {
        return $this->view('edit', [
            'albums' => Album::with('artist')->get()->sortBy('artist.name'),
            'song' => $song->load('album.artist'),
        ]);
    }

    public function update(Request $request, Song $song)
    {
        $song->fill( $request->all() );

        $song->save();

        return to_route('songs.index')->with('success', 'Canción actualizada');
    }

    public function destroy(Song $song)
    {
        $song->delete();

        return to_route('songs.index')->with('success', 'Canción eliminada');
    }
}
