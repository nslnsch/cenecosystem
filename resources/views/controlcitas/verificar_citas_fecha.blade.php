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
    <script>
        $(document).ready(function() {
            $('#Buscar').click(function() {
                var focus;
                var fecha = $('#fecha1').val().trim();
                var fecha2 = $('#fecha2').val().trim();
                /**************************************************************************/
                date = fecha;
                x = new Date();
                vldfecha = date.split("-");
                x.setFullYear(vldfecha[0], vldfecha[1] - 1, vldfecha[2]);
                fechaactual = new Date();
                /**************************************************************************/
                date2 = fecha2;
                y = new Date();
                vldfecha2 = date2.split("-");
                y.setFullYear(vldfecha2[0], vldfecha2[1] - 1, vldfecha2[2]);
                fechaactual2 = new Date();
                /**************************************************************************/
                if (fecha == null || fecha == "") {
                    alert("Debe Seleccionar la fecha desde");
                    focus = document.getElementById("fecha1").focus();
                    return false;
                } else if (x > fechaactual) {
                    alert("Fecha Desde Invalida! debe ingresar una fecha menor ó igual a la actual.");
                    focus = document.getElementById("fecha1").focus();
                    return false;
                }else if (fecha2 == null || fecha2 == ""){
                    alert("Debe Seleccionar la fecha hasta");
                    focus = document.getElementById("fecha2").focus();
                    return false;
                }else if (y > fechaactual2) {
                    alert("Fecha Hasta Invalida! debe ingresar una fecha menor ó igual a la actual.");
                    focus = document.getElementById("fecha2").focus();
                    return false;
                }else{}
            });
        });
    </script>
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">{{ Session::get('message') }}...</div>
    @endif
    <div class="container-fluid with-mt">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header bg-primary text-center">
                        <h4>Control de Citas por Rango de Fechas</h4>
                    </div>
                    <div class="card-header bg-white">
                        <form action="{{route('verify_cita_fecha')}}" method="get">
                            <div class="form-group row">
                                <div class="col-md-6 col-md-push-8">
                                    Desde <input type="date" class="form-controller" id="fecha1" maxlength="25" name="fecha1" autofocus placeholder="Buscar" title="Buscar citas por rango de fechas" style="border-width: 0;outline: 0;" autocomplete="off" required> Hasta <input type="date" class="form-controller" id="fecha2" maxlength="25" name="fecha2" autofocus placeholder="Buscar" title="Buscar citas por rango de fechas" style="border-width: 0;outline: 0;" autocomplete="off" required><button type="submit" class="btn btn-primary" id="Buscar"><i class="fas fa-search"></i> Buscar</button>
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
                        <p>Desde: <strong>{{ Date::parse($fecha1)->format('d/m/Y')}}</strong> Hasta: <strong>{{ Date::parse($fecha2)->format('d/m/Y')}}</strong></p>
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
                                                    <a href="javascript:enviardatos('{{route('check_fecha', ['id' => $dato->id, 'fecha1' => $fecha1, 'fecha2' => $fecha2])}}')" class="btn btn-danger btn-sm" title="Estado del Estudio: En Espera">
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