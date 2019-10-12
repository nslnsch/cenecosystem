@extends('admin')
@section('content')
    <style type="text/css">
        .select {
             background: transparent;
             border: none;
             font-size: 14px;
             height: 30px;
             padding: 5px;
             width: 250px;
        }
        .select:focus{ outline: none;}
    </style>
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
                    <div class="card-header bg-white">
                      <div class="form-group row">
                        <div class="col-md-12">
                            <div class="bg-primary"><strong>Criterios de Búsqueda</strong></div><br>
                                <form action="{{route('verify_cita')}}" method="get">
                                    <div class="form-group row">
                                        <div class="col-md-2 col-md-push-8">
                                            <select id="consultorio" name="consultorio" class="select" title="Selecciona un Consultorio" style="width: 110px;">
                                                <option value="" selected>Consultorio</option>
                                                @foreach($consultorios as $con)
                                                    <option value="{{$con->nombre_consult}}">{{$con->nombre_consult}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- Default inline 1-->
                                        <div class="col-md-6 col-md-push-8">
                                            <div class="custom-control custom-radio custom-control-inline">
                                              <input type="radio" class="custom-control-input" required id="hoy" name="consulta" value="hoy">
                                              <label class="custom-control-label" for="hoy">Hoy</label>
                                            </div>

                                            <!-- Default inline 2-->
                                            <div class="custom-control custom-radio custom-control-inline">
                                              <input type="radio" class="custom-control-input" id="defaultInline2" name="consulta" value="mesactual">
                                              <label class="custom-control-label" for="defaultInline2">Mes Actual</label>
                                            </div>

                                            <!-- Default inline 3-->
                                            <div class="custom-control custom-radio custom-control-inline">
                                              <input type="radio" class="custom-control-input" id="defaultInline3" name="consulta" value="mesanterior">
                                              <label class="custom-control-label" for="defaultInline3">Mes Anterior</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-md-push-8">
                                            <button type="submit" class="btn btn-primary d-block float-right ml-auto" id="verificar" title="Consultar Cita"><i class="fas fa-search"></i> Consultar</button>
                                            <a href="{{route('imprimir')}}">
                                            <button type="button" class="btn btn-warning d-block float-right ml-auto" id="imprimir" title="Imprimir Reporte"><i class="fas fa-print"></i> Imprimir</button></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
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
                                        <td>
                                            @if ($dato->estado == "Entregado")
                                                <a href="#" onclick="return false" class="btn btn-success btn-sm" title="Estado del Estudio: Entregado">
                                                    <i class="fas fa-check"></i>
                                                </a></td><td>
                                                <a href="{{route('citas.show',$dato->id)}}" class="btn btn-info btn-sm" title="Ver Información completa de la cita">
                                                    <i class="far fa-eye"></i>
                                                </a></td><td>
                                                <a href="{{route('citas.edit',$dato->id)}}" onclick="return false" class="btn btn-warning btn-sm" title="Editar">
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                </a></td><td>
                                                <form action="{{route('citas.destroy',$dato->id)}}" style="display:inline-block;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" disabled title="Eliminar" onclick="return confirm('Realmente desea eliminar esta cita?')"><i  class="fa fa-trash"></i></button>
                                                </form></td>
                                            @else

                                               <td><a href="javascript:enviardatos('{{route('check',$dato->id)}}')" class="btn btn-danger btn-sm" title="Estado del Estudio: En Espera">
                                                    <i class="far fa-clock"></i>
                                                </a></td><td>
                                                <a href="{{route('citas.show',$dato->id)}}" class="btn btn-info btn-sm" title="Ver Información completa de la cita">
                                                    <i class="far fa-eye"></i>
                                                </a></td><td>
                                                <a href="{{route('citas.edit',$dato->id)}}" class="btn btn-warning btn-sm" title="Editar">
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                </a></td><td>
                                                <form action="{{route('citas.destroy',$dato->id)}}" style="display:inline-block;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Eliminar" onclick="return confirm('Realmente desea eliminar esta cita?')"><i  class="fa fa-trash"></i></button>
                                                </form>
                                            @endif
                                        </td>
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