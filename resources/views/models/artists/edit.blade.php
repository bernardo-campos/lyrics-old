@extends('adminlte::page')

@section('title', 'Editar Artista')

@section('content_header')
    <h1 class="m-0 text-dark">Editar Artista</h1>
@stop

@section('content')

    @include('models.artists._partials.form', [
        'action' => route('artists.update', $artist),
        'artist' => $artist,
        'put' => true,
    ])

@stop
