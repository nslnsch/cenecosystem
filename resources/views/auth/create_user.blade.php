@extends('admin')
@section('content')
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">{{ Session::get('message') }}...</div>
    @endif
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header bg-primary text-center">
                        <h4>Nuevo Usuario</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('usuario.store')}}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-6 col-md-push-8"  {{ $errors->has('name') ? 'has-error' : '' }}>
                                    <label for="name" class="text-primary">Nombre</label>
                                    <input type="text" name="name" required class="form-control" pattern="^([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\']+[\s])+([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])+[\s]?([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])?$">
                                    {!! $errors -> first('name', '<span class=error>:message</span>') !!}
                                </div>
                                <div class="col-md-6 col-md-push-8" {{ $errors->has('email') ? 'has-error' : '' }}>
                                    <label for="email" class="text-primary">Email</label>
                                    <input type="text" name="email" required class="form-control">
                                    {!! $errors -> first('email', '<span class=error>:message</span>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 col-md-push-8" {{ $errors->has('password') ? 'has-error' : '' }}>
                                    <label for="password" class="text-primary">Contraseña</label>
                                    <input type="password" name="password" required class="form-control" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="La Contraseña debe tener minimo 8 caracteres y al menos: 1 minúscula, 1 mayúscula, 1 número, 1 símbolo">
                                    {!! $errors -> first('password', '<span class=error>:message</span>') !!}
                                </div>
                                <div class="col-md-6 col-md-push-8" {{ $errors->has('rol') ? 'has-error' : '' }}>
                                    <label for="rol" class="text-primary">Rol</label>
                                    <select class="form-control" name="rol" {{ $errors->has('name') ? 'has-error' : '' }}>
                                        @foreach ($roles as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors -> first('rol', '<span class=error>:message</span>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary" onclick="return confirm('Verifique los datos del Usuario antes de Registrar?')"><i class="fas fa-user-plus"></i> Registrar</button>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ url()->previous() }}" style="text-decoration:none;display:block;margin-left:auto;max-width:30%;" class="btn btn-danger"><i class="fas fa-undo-alt"></i> Regresar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection