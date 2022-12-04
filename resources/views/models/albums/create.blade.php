@extends('adminlte::page')

@section('title', 'Crear Álbum')

@section('content_header')
    <h1 class="m-0 text-dark">Crear Álbum</h1>
@stop

@section('content')

    @include('models.albums._partials.form', [
        'action' => route('albums.store'),
        'album' => new \App\Models\Album,
        'artists' => $artists,
    ])

@stop
