@extends('layouts.app')

@section('content')
<div class="container container-style">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="border-radius: 10px;">
                <div class="card-header text-primary">Iniciar Sesión</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Ingrese E-mail</label>
                            <div class="col-md-6 inner-addon left-addon">
                                <i class="far fa-user glyphicon"></i>
                                <input autofocus id="email" placeholder="Ingrese E-mail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus pattern="[a-zA-Z0-9.+_-]+@[a-zA-Z0-9.-]+\.[a-zA-Z0-9.-]+" title="Formato de Correo: ceneco@ceneco.com">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Ingrese Contraseña</label>
                            <div class="col-md-6 inner-addon left-addon">
                                <i class="fas fa-key glyphicon"></i>
                                <input id="password" placeholder="Ingrese Contraseña" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="off" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" oninput="check_text(this);" title="La Contraseña debe tener minimo 8 caracteres y al menos: 1 minúscula, 1 mayúscula, 1 número, 1 símbolo">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        Recuerdame
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-sign-in-alt"></i>
                                    Iniciar Sesión
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Olvidaste tu contraseña?
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
