@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Álbumes')

@section('content_header')
    <div class="d-flex">
        <div>
            <h1 class="m-0 text-dark">Álbumes</h1>
            <small></small>
        </div>
        <a href="{{ route('albums.create') }}" class="ml-auto">
            <x-adminlte-button label="Nuevo" theme="success" icon="fas fa-plus"/>
        </a>
    </div>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-body">
                @include('models.albums._partials.datatable')
            </div>

        </div>

    </div>
</div>
@stop
