@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Artistas')

@section('content_header')
    <div class="d-flex">
        <div>
            <h1 class="m-0 text-dark">Artistas</h1>
            <small></small>
        </div>
        <a href="{{ route('artists.create') }}" class="ml-auto">
            <x-adminlte-button label="Nuevo" theme="success" icon="fas fa-plus"/>
        </a>
    </div>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-body">
                <table id="artists" class="table table-sm">
                    <thead>
                        <tr>
                            <th style="width: 10px">Id</th>
                            <th>Nombre</th>
                            <th>Álbumes</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($artists as $artist)
                            <tr>
                                <td>{{ $artist->id }}</td>
                                <td>{{ $artist->name }}</td>
                                <td>{{ $artist->albums_count }}</td>
                                <td class="d-flex">
                                    <a title="Editar" href="{{ route('artists.edit', $artist) }}" class="btn btn-sm btn-warning py-0 px-1"><i class="fa fa-edit"></i></a>
                                    <form action="{{ route('artists.destroy', $artist) }}" method="post" class="d-flex" onSubmit="return confirm('¿Está seguro/a que desea quitar &laquo;{{ $artist->name }}&raquo;?');">
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
    $('#artists').DataTable({
        "stateSave": true,
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
        }
    });
</script>
@endpush