@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Canciones')

@section('content_header')
    <div class="d-flex">
        <div>
            <h1 class="m-0 text-dark">Canciones</h1>
            <small></small>
        </div>
        <a href="{{ route('songs.create') }}" class="ml-auto">
            <x-adminlte-button label="Nuevo" theme="success" icon="fas fa-plus"/>
        </a>
    </div>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-body">
                @include('models.songs._partials.datatable')
            </div>

        </div>

    </div>
</div>
@stop
