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
                <table id="albums" class="table table-sm">
                    <thead>
                        <tr>
                            <th style="width: 10px">Id</th>
                            <th>Nombre</th>
                            <th>Año</th>
                            <th>Artista</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($albums as $album)
                            <tr>
                                <td>{{ $album->id }}</td>
                                <td>{{ $album->name }}</td>
                                <td>{{ $album->year }}</td>
                                <td>{{ $album->artist->name }}</td>
                                <td class="d-flex">
                                    <a title="Editar" href="{{ route('albums.edit', $album) }}" class="btn btn-sm btn-warning py-0 px-1"><i class="fa fa-edit"></i></a>
                                    <form action="{{ route('albums.destroy', $album) }}" method="post" class="d-flex" onSubmit="return confirm('¿Está seguro/a que desea quitar &laquo;{{ $album->name }}&raquo;?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger ml-1 py-0 px-1" title="Eliminar">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</div>
@stop

@push('js')
<script type="text/javascript">
    $('#albums').DataTable({
        "stateSave": true,
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
        }
    });
</script>
@endpush