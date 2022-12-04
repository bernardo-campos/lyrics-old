@extends('adminlte::page')

@section('title', 'Crear Canción')

@section('content_header')
    <h1 class="m-0 text-dark">Crear Canción</h1>
@stop

@section('content')

    @include('models.songs._partials.form', [
        'action' => route('songs.store'),
        'song' => new \App\Models\Song,
    ])

@stop
