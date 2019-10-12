@extends('admin')
@section('content')
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">{{ Session::get('message') }}...</div>
    @endif
    <div class="container-fluid with-mt">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header ">Lista de Referencias
                        <a href="{{route('referencias.create')}}"><button class="btn btn-primary d-block float-right ml-auto"><i class="fas fa-user-plus"></i> Nuevo</button></a>
                    </div>
                    <div class="card-body">
                        <form action="{{route('search.referencia')}}" method="POST">
                            @csrf
                            <input type="text" class="form-controller" id="search" maxlength="25" name="search" autofocus placeholder="Buscar" title="Buscar referencia por Nombre o por Tipo" style="border-width: 0;outline: 0;" autocomplete="off"><button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Buscar</button>
                        </form>
                        <table class="table table-striped">
                            <thead>
                                <th>Cédula-Rif</th>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Tipo</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                                @foreach ($datos as $dato)
                                    <tr>
                                        <td>{{$dato->ced_rif}}</td>
                                        <td>{{$dato->nombre_ref}}</td>
                                        <td>{{$dato->telefono_ref}}</td>
                                        <td>{{$dato->tipo_ref}}</td>
                                        <td>
                                            <a href="{{route('referencias.edit', $dato->id )}}" class="btn btn-warning">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>
                                            <form action="{{route('referencias.destroy', $dato->id )}}" style="display:inline-block;" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" title="eliminar" onclick="return confirm('Realmente desea eliminar esta Referencia?')"><i  class="fa fa-trash"></i></button>
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