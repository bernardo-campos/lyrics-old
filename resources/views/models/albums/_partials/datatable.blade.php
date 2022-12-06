<table id="albums" class="table table-sm">
<thead>
    <tr>
        <th style="width: 10px">Id</th>
        <th>Nombre</th>
        <th>Año</th>
        <th>Artista</th>
        <th>Canciones</th>
        <th></th>
    </tr>
</thead>
<tbody></tbody>
</table>

@push('js')
<script type="text/javascript">
$(document).ready(function () {

    let csrf_html = `@csrf`;
    let delete_html = `@method('DELETE')`;

    var dt = $('#albums').DataTable({
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
        },
        stateSave: true,
        processing: true,
        serverSide: true,
        ajax: '{{ route('albums.index') }}',
        search: {
            return: true,
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'year', name: 'year' },
            { data: 'artist.name', name: 'artist.name' },
            { data: 'songs_count', name: 'songs_count', searchable: false },
            {
                data: null,
                defaultContent: '',
                orderable: false,
                render: function (data, type, row, meta) {
                    if (type === 'display') {
                        return `
                        <div class="d-flex">
                        <a title="Editar" href="${row.urls.edit}" class="btn btn-sm btn-warning py-0 px-1"><i class="fa fa-edit"></i></a>
                        <form action="${row.urls.destroy}" method="post" class="d-flex" onSubmit="return confirm('¿Está seguro/a que desea quitar &laquo;${data.name}&raquo;?');">
                            ${csrf_html + delete_html}
                            <button class="btn btn-sm btn-danger ml-1 py-0 px-1" title="Eliminar">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>`
                        ;
                    }
                }
            },
        ]
    });
});
</script>
@endpush

@push('css')
<style type="text/css">
    #albums {
        width: 100%!important;
    }
    div#albums_processing:before {
        content: '';
        display: block;
        cursor: progress;
        background-color: #ffffff85;
        position: fixed;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
    }
</style>
@endpush