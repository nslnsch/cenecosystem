@extends('admin')
@section('content')
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">{{ Session::get('message') }}...</div>
    @endif
    <div class="container-fluid with-mt">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header bg-primary">
                        <div class="form-group row">
                            <div class="col-md-6 col-md-push-8">
                                <h4>Bitácora</h4>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-md-push-8">
                                <a href="{{route('home')}}" class="btn btn-danger float-right d-block ml-auto" title="Cerrar"><i class="fas fa-times"></i> Cerrar</a>
                                <a href="{{route('imprimir.bitacora',$fecha)}}"><button type="button" class="btn btn-warning d-block float-right ml-auto" id="imprimir" title="Imprimir Reporte"><i class="fas fa-print"></i> Imprimir</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('search.bitacora')}}" method="POST">
                            @csrf
                            <input type="date" class="form-controller" id="search" maxlength="25" name="search" value="{{ old('search') }}" autofocus style="border-width: 0;outline: 0;" autocomplete="off"><button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Buscar</button>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="bg-warning">
                                    <th>Codigo_Usuario</th>
                                    <th>IP</th>
                                    <th>Acción</th>
                                    <th>Fecha</th>
                                </thead>
                                <tbody>
                                    @foreach ($bitacora as $bit)
                                        <tr>
                                            <td>{{$bit->id_user}}</td>
                                            <td>{{$bit->ip}}</td>
                                            <td>{{$bit->log}}</td>
                                            <td>{{ Date::parse($bit->fecha)->format('d/m/Y')}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if ($bitacora instanceof \Illuminate\Pagination\LengthAwarePaginator)
                            <div class="form-group row">
                                <div class="col-md-6 col-md-push-8">
                                    {{$bitacora->appends($_REQUEST)->render()}}
                                </div>
                                <div class="col-md-6 col-md-push-8">
                                    <p class="d-block float-right ml-auto">Registros del {{ $bitacora->firstItem() }} al {{ $bitacora->lastItem() }} de {{ $bitacora->total() }} filtrados</p>

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