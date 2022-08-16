{{-- Email field --}}
<div class="input-group mb-3">
    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
           value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}" autofocus>

    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
        </div>
    </div>

    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>