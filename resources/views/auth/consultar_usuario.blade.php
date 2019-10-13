@extends('admin')
@section('content')
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">{{ Session::get('message') }}...</div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header bg-primary">
                        <div class="form-group row">
                            <div class="col-md-6 col-md-push-8">
                                <h4>Lista de Usuarios</h4>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-md-push-8">
                                <a href="{{route('home')}}" class="btn btn-danger float-right d-block ml-auto" title="Cerrar"><i class="fas fa-times"></i> Cerrar</a>
                                <a href="{{route('usuario.create')}}"><button class="btn btn-primary d-block float-right ml-auto"><i class="fas fa-user-plus"></i> Nuevo</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('search.user')}}" method="POST">
                            @csrf
                            <input type="text" class="form-controller" id="search" maxlength="20" name="search" autofocus placeholder="Buscar" style="border-width: 0;outline: 0;" title="buscar usuario por Nombre o por E-mail" autocomplete="off"><button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Buscar</button>
                        </form>
                        <table class="table table-striped">
                            <thead>
                                <th>Nombre</th>
                                <th>E-mail</th>
                                <th>Rol</th>
                                <th>Acciónes</th>
                            </thead>
                            <tbody>
                                @foreach ($datos as $dato)
                                    <tr>
                                        <td>{{$dato->name}}</td>
                                        <td>{{$dato->email}}</td>
                                        <td>{{$dato->roles->implode('name',', ')}}</td>
                                        <td>
                                            <a href="{{route('usuario.edit',$dato->id)}}" class="btn btn-warning">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>
                                            <form action="{{route('usuario.destroy',$dato->id)}}" style="display:inline-block;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" title="eliminar" onclick="return confirm('Realmente desea eliminar este Usuario?')"><i  class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if ($datos instanceof \Illuminate\Pagination\LengthAwarePaginator)
                            <div class="form-group row">
                                <div class="col-md-6 col-md-push-8">
                                    {{$datos->appends($_REQUEST)->render()}}
                                </div>
                                <div class="col-md-6 col-md-push-8">
                                    <p class="d-block float-right ml-auto">Registros del {{ $datos->firstItem() }} al {{ $datos->lastItem() }} de {{ $datos->total() }} filtrados</p>

                                </div>
                            </div>
                        @else
                            {{-- false expr --}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection