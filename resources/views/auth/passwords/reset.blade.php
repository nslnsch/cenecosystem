@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Recuperar Contraseña</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Ingrese E-mail</label>

                            <div class="col-md-6 inner-addon left-addon">
                                <i class="far fa-user glyphicon"></i>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus pattern="[a-zA-Z0-9.+_-]+@[a-zA-Z0-9.-]+\.[a-zA-Z0-9.-]+" title="Formato de Correo: ceneco@ceneco.com" placeholder="Ingrese E-mail">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                            <div class="col-md-6 inner-addon left-addon">
                                <i class="fas fa-key glyphicon"></i>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" oninput="check_text(this);" title="La Contraseña debe tener minimo 8 caracteres y al menos: 1 minúscula, 1 mayúscula, 1 número, 1 símbolo" placeholder="Nueva contraseña">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar Contraseña</label>

                            <div class="col-md-6 inner-addon left-addon">
                                <i class="fas fa-key glyphicon"></i>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" oninput="check_text(this);" title="La Contraseña debe tener minimo 8 caracteres y al menos: 1 minúscula, 1 mayúscula, 1 número, 1 símbolo" placeholder="Confirmar Contraseña">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" title="Recuperar Contraseña">
                                    Recuperar Contraseña
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
