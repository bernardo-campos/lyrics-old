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
                <table id="songs" class="table table-sm">
                    <thead>
                        <tr>
                            <th style="width: 10px">Id</th>
                            <th>Artista</th>
                            <th>Álbum</th>
                            <th>Título</th>
                            <th>Letra</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($songs as $song)
                            <tr>
                                <td>{{ $song->id }}</td>
                                <td>{{ $song->album->artist->name }}</td>
                                <td>{{ $song->album->name }}</td>
                                <td>{{ $song->name }}</td>
                                <td>
                                    <div>{!! $song->lyric !!}</div>
                                </td>
                                <td class="d-flex">
                                    <a title="Editar" href="{{ route('songs.edit', $song) }}" class="btn btn-sm btn-warning py-0 px-1"><i class="fa fa-edit"></i></a>
                                    <form action="{{ route('songs.destroy', $song) }}" method="post" class="d-flex" onSubmit="return confirm('¿Está seguro/a que desea quitar &laquo;{{ $song->name }}&raquo;?');">
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
    $('#songs').DataTable({
        "stateSave": true,
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
        }
    });
</script>
@endpush
