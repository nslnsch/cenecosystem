@extends('admin')
@section('content')
    <script type="text/javascript">
        function enviardatos(urlid){
            var recibido;
            if(recibido=prompt("Recibido por: ")){
                if(confirm('Recibido por: '+recibido+' es Correcto?')){
                    document.location = urlid+'&recibido='+recibido;
                }
                else{}
            }else{}
        }
    </script>
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">{{ Session::get('message') }}...</div>
    @endif
    <div class="container-fluid with-mt">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header bg-primary text-center">
                        <h4>Control de Citas Actuales</h4>
                    </div>
                    <div class="card-header bg-white">
                        <form action="{{route('verify_cita')}}" method="get">
                            <div class="form-group row">
                                <div class="col-md-6 col-md-push-8">
                                    <input type="text" class="form-controller" id="search" maxlength="25" name="search" autofocus placeholder="Buscar" title="Buscar citas por Cédula ó por Nombre" style="border-width: 0;outline: 0;" autocomplete="off"><button type="submit" class="btn btn-primary" title="Buscar"><i class="fas fa-search"></i> Buscar</button>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 col-md-push-8">
                                    <a href="{{route('home')}}" class="btn btn-danger float-right d-block ml-auto" title="Cerrar"><i class="fas fa-times"></i> Cerrar</a>
                                    <a href="{{route('imprimir')}}">
                                    <button type="button" class="btn btn-warning float-right d-block ml-auto" id="imprimir" title="Imprimir Reporte"><i class="fas fa-print"></i> Imprimir</button></a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="fecha" id="fecha" value="{{ Date::parse('now')->format('Y-m-d')}}"><p>Fecha: <strong>{{ Date::parse('now')->format('d/m/Y')}}</strong></p>
                        <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Cédula</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Consultorio</th>
                                    <th>Estudio</th>
                                    <th>Sub-Estudio</th>
                                    <th colspan="6">Acción</th>
                                </tr>
                            </thead>
                            @foreach ($query as $dato)
                                <tbody>
                                    <tr>
                                        <td>{{$dato->cedula}}</td>
                                        <td>{{$dato->nombre}}</td>
                                        <td>{{$dato->apellido}}</td>
                                        <td>{{$dato->nombre_consult}}</td>
                                        <td>{{$dato->nombre_est}}</td>
                                        <td>{{$dato->comp}}</td>

                                            @if ($dato->estado == "Entregado")
                                                <td>
                                                    <a href="#" onclick="return false" class="btn btn-success btn-sm" title="Estado del Estudio: Entregado">
                                                    <i class="fas fa-check"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{route('citas.show',$dato->id)}}" class="btn btn-info btn-sm" title="Ver Información completa de la cita">
                                                    <i class="far fa-eye"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{route('citas.edit',$dato->id)}}" onclick="return false" class="btn btn-warning btn-sm" title="Editar">
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="{{route('citas.destroy',$dato->id)}}" style="display:inline-block;" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" disabled title="Eliminar" onclick="return confirm('Realmente desea eliminar esta cita?')"><i  class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            @else
                                               <td>
                                                    <a href="javascript:enviardatos('{{route('check',$dato->id)}}')" class="btn btn-danger btn-sm" title="Estado del Estudio: En Espera">
                                                    <i class="far fa-clock"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{route('citas.show',$dato->id)}}" class="btn btn-info btn-sm" title="Ver Información completa de la cita">
                                                    <i class="far fa-eye"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{route('citas.edit',$dato->id)}}" class="btn btn-warning btn-sm" title="Editar">
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="{{route('citas.destroy',$dato->id)}}" style="display:inline-block;" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" title="Eliminar" onclick="return confirm('Realmente desea eliminar esta cita?')"><i  class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            @endif
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-md-push-8">
                                {{$query->appends($_REQUEST)->render()}}
                            </div>
                            <div class="col-md-6 col-md-push-8">
                                <p class="d-block float-right ml-auto">Registros del {{ $query->firstItem() }} al {{ $query->lastItem() }} de {{ $query->total() }} filtrados</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection