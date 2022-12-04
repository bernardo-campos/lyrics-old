@extends('adminlte::page')

@section('title', 'Editar Álbum')

@section('content_header')
    <h1 class="m-0 text-dark">Editar Álbum</h1>
@stop

@section('content')

    @include('models.albums._partials.form', [
        'action' => route('albums.update', $album),
        'album' => $album,
        'put' => true,
    ])

@stop
