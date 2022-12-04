<form class="form-horizontal" action="{{ $action }}" method="POST">
    @csrf @isset ($put) @method('PUT') @endisset
    <div class="card">
        <div class="card-body">

            <div class="row">
                <x-adminlte-select
                    id="artist_id"
                    name="artist_id"
                    label="Artista"
                    fgroup-class="col-lg-12"
                    igroup-class="col-lg-10"
                >
                    <option value=""></option>
                    @foreach ($artists as $artist)
                        <option value="{{ $artist->id }}" @selected(old('artist_id', $album->artist?->id) == $artist->id)>{{ $artist->name }}</option>
                    @endforeach
                </x-adminlte-select>

                <x-adminlte-input
                    value="{{ old('name', $album->name) }}"
                    id="name"
                    name="name"
                    type="text"
                    label="Nombre del álbum"
                    fgroup-class="col-12"
                    required
                />

                <x-adminlte-input
                    value="{{ old('year', $album->year) }}"
                    id="year"
                    name="year"
                    type="number"
                    label="Año"
                    fgroup-class="col-12"
                />

            </div>
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
