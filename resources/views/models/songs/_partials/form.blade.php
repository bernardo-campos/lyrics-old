<form class="form-horizontal" action="{{ $action }}" method="POST">
    @csrf @isset ($put) @method('PUT') @endisset
    <div class="card">
        <div class="card-body">

            <div class="row">
                <x-adminlte-select
                    id="album_id"
                    name="album_id"
                    label="Álbum"
                    fgroup-class="col-lg-12"
                    igroup-class="col-lg-10"
                >
                    <option value=""></option>
                    @foreach ($albums as $album)
                        <option value="{{ $album->id }}" @selected(old('album_id', $song->album?->id) == $album->id)>{{ $album->name }} ({{ $album->artist->name }})</option>
                    @endforeach
                </x-adminlte-select>

                <x-adminlte-input
                    value="{{ old('name', $song->name) }}"
                    id="name"
                    name="name"
                    type="text"
                    label="Nombre de la canción"
                    fgroup-class="col-12"
                    required
                />

                @php($lines = substr_count($song->lyric, "\n") + 1)

                <x-adminlte-textarea
                    id="lyric"
                    name="lyric"
                    label="Letra"
                    fgroup-class="col-12"
                    rows="{{ $lines }}"
                >{{$song->lyric}}</x-adminlte-textarea>
        </div>

        <div class="card-footer d-flex">
            <x-adminlte-button class="ml-auto"
                label="Guardar"
                theme="primary"
                icon="fas fa-save"
                type="submit"
            />
        </div>
    </div>
</form>
