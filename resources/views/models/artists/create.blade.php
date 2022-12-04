@extends('adminlte::page')

@section('title', 'Crear Artista')

@section('content_header')
    <h1 class="m-0 text-dark">Crear Artista</h1>
@stop

@section('content')

    @include('models.artists._partials.form', [
        'action' => route('artists.store'),
        'artist' => new \App\Models\Artist,
    ])

@stop
