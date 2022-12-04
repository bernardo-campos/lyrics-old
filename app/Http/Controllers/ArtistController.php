<?php

namespace App\Http\Controllers;

use App\Http\Requests\Artist\StoreRequest;
use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index() {
        return view('models.artists.index', [
            'artists' => Artist::get(),
            //withCount('albums')
        ]);
    }

    public function create() {
        return view('models.artists.create');
    }

    public function store(StoreRequest $request) {
        Artist::create( $request->all() );

        return to_route('artists.index')->with('success', 'Artista creado');
    }

    public function edit(Artist $artist) {
        return view('models.artists.edit', [
            'artist' => $artist,
        ]);
    }

    public function update(StoreRequest $request, Artist $artist) {
        $artist->fill( $request->all() );

        $artist->save();

        return to_route('artists.index')->with('success', 'Artista actualizado');
    }

    public function destroy(Artist $artist) {
        $artist->delete();

        return to_route('artists.index')->with('success', 'Artista eliminado');
    }

}
