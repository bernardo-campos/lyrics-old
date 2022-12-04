<form class="form-horizontal" action="{{ $action }}" method="POST">
    @csrf @isset ($put) @method('PUT') @endisset
    <div class="card">
        <div class="card-body">

            <div class="row">
                <x-adminlte-input
                    value="{{ old('name', $artist->name) }}"
                    id="name"
                    name="name"
                    type="text"
                    label="Artista"
                    fgroup-class="col-12"
                    required
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
