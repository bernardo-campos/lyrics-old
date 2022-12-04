@extends('adminlte::page')

@section('title', 'Editar Canción')

@section('content_header')
    <h1 class="m-0 text-dark">Editar Canción</h1>
@stop

@section('content')

    @include('models.songs._partials.form', [
        'action' => route('songs.update', $song),
        'song' => $song,
        'put' => true,
    ])

@stop
