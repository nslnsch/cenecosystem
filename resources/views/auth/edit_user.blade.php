@extends('admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header text-primary text-center">
                        <h4>Actualizar Usuario</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('usuario.update',$usuario->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <div class="col-md-6 col-md-push-8" {{ $errors->has('name') ? 'has-error' : '' }}>
                                    <label for="name" class="text-primary">Nombre</label>
                                    <input type="text" name="name" required class="form-control" value="{{$usuario->name}}" pattern="^([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\']+[\s])+([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])+[\s]?([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])?$">
                                    {!! $errors -> first('name', '<span class=error>:message</span>') !!}
                                </div>
                                <div class="col-md-6 col-md-push-8" {{ $errors->has('email') ? 'has-error' : '' }}>
                                    <label for="email" class="text-primary">Email</label>
                                    <input type="text" name="email" required class="form-control" value="{{$usuario->email}}">
                                    {!! $errors -> first('email', '<span class=error>:message</span>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 col-md-push-8" {{ $errors->has('email') ? 'has-error' : '' }}>
                                    <label for="password" class="text-primary">Contraseña</label>
                                    <input type="password" name="password" required class="form-control">
                                    {!! $errors -> first('password', '<span class=error>:message</span>') !!}
                                </div>
                                @role('admin|usuario')
                                <div class="col-md-6 col-md-push-8" {{ $errors->has('rol') ? 'has-error' : '' }}>
                                    <label for="rol" class="text-primary">Rol</label>
                                    <select class="form-control" name="rol">
                                        @foreach ($roles as $key => $value)
                                            @if ($usuario->hasRole($value))
                                                <option value="{{$key}}" selected>{{$value}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    {!! $errors -> first('rol', '<span class=error>:message</span>') !!}
                                </div>
                                @endrole
                                @role('super-admin')
                                <div class="col-md-6 col-md-push-8" {{ $errors->has('rol') ? 'has-error' : '' }}>
                                    <label for="rol" class="text-primary">Rol</label>
                                    <select class="form-control" name="rol">
                                        @foreach ($roles as $key => $value)
                                            @if ($usuario->hasRole($value))
                                                <option value="{{$key}}" selected>{{$value}}</option>
                                            @else
                                                <option value="{{$key}}">{{$value}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    {!! $errors -> first('rol', '<span class=error>:message</span>') !!}
                                </div>
                                @endrole
                            </div>
                            <div class="form-group row">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary" onclick="return confirm('Verifique los datos del Usuario antes de Actualizar?')"><i class="fas fa-user-edit"></i> Actualizar</button>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('home')}}" style="text-decoration:none;display:block;margin-left:auto;max-width:30%;" class="btn btn-danger"><i class="fas fa-undo-alt"></i> Cerrar</a>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection