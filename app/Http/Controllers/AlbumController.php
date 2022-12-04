<?php

namespace App\Http\Controllers;

use App\Http\Requests\Album\StoreRequest;
use App\Models\Album;
use App\Models\Artist;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index() {
        return view('models.albums.index', [
            'albums' => Album::with('artist')->withCount('songs')->get(),
        ]);
    }

    public function create() {
        return view('models.albums.create', [
            'artists' => Artist::all(),
        ]);
    }

    public function store(StoreRequest $request) {
        Album::create( $request->validated() );

        return to_route('albums.index')->with('success', 'Álbum creado');
    }

    public function edit(Album $album) {
        return view('models.albums.edit', [
            'album' => $album->load('artist'),
            'artists' => Artist::all(),
        ]);
    }

    public function update(StoreRequest $request, Album $album) {
        $album->fill( $request->validated() );

        $album->save();

        return to_route('albums.index')->with('success', 'Álbum actualizado');
    }

    public function destroy(Album $album) {
        $album->delete();

        return to_route('albums.index')->with('success', 'Álbum eliminado');
    }
}
