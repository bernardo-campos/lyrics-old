 <div class="alert alert-info alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h6><i class="icon fas fa-info"></i> Atención!</h6>
  La aplicación está en modo <b>local</b>, ingresá sin contraseña
</div>
<div class="input-group mb-3">
    <select class="form-control" name="email" onchange="document.querySelector('#password').value='no-empty-string'">
        <option value=""></option>
        @foreach (App\Models\User::take(20)->get() as $user)
            <option value="{{ $user->email }}">{{ $user->email }}</option>
        @endforeach
    </select>

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
