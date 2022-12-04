<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    private function view(...$args)
    {
        $args[0] = 'models.songs.'.$args[0];
        return view(...$args);
    }

    public function index()
    {
        return $this->view('index', [
            'songs' => Song::with('album.artist')->get(),
        ]);
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
