<?php

namespace App\Http\Controllers;

use App\Http\Requests\Artist\StoreRequest;
use App\Models\Artist;
use Illuminate\Http\Request;
use DataTables;

class ArtistController extends Controller
{
    public function index()
    {
        if (!request()->ajax()) {
            return view('models.artists.index');
        }

        $query = Artist::query()
            ->withCount('albums')
        ;

        return DataTables::eloquent($query)
            ->addColumn('urls', fn(Artist $artist) => [
                'edit' => route('artists.edit', $artist),
                'destroy' => route('artists.destroy', $artist),
            ])
            ->make(true)
        ;
    }

    public function create() {
        return view('models.artists.create');
    }

    public function store(StoreRequest $request) {
        Artist::create( $request->validated() );

        return to_route('artists.index')->with('success', 'Artista creado');
    }

    public function edit(Artist $artist) {
        return view('models.artists.edit', [
            'artist' => $artist,
        ]);
    }

    public function update(StoreRequest $request, Artist $artist) {
        $artist->fill( $request->validated() );

        $artist->save();

        return to_route('artists.index')->with('success', 'Artista actualizado');
    }

    public function destroy(Artist $artist) {
        $artist->delete();

        return to_route('artists.index')->with('success', 'Artista eliminado');
    }

}
