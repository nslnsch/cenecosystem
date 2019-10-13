@extends('admin')
@section('content')
    <div class="container-fluid with-mt">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header bg-primary">
                      <div class="form-group row">
                        <div class="col-md-6 col-md-push-8">
                            <h4>Historial de Pacientes</h4>
                        </div>
                        <div class="col-md-6 col-md-push-8">
                              <a href="{{route('home')}}" style="text-decoration:none;display:block;margin-left:auto;max-width:30%;" class="btn btn-danger"><i class="fas fa-times"></i> Cerrar</a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                    <div class="bg-warning" style="font-size: 15px;color: #FFF;">Paciente: <strong>{{$paciente->nombre}} {{$paciente->apellido}}</strong></div>
                        <table class="table table-striped">
                            @foreach ($query as $cita)
                            <thead>
                                <tr>
                                    <th colspan="4" class="text-center">{{ Date::parse($cita->fecha)->format('d/m/Y')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Cédula:</strong> {{$cita->cedula}}</td>
                                    <td><strong>Teléfono:</strong> {{$cita->telefono}}</td>
                                    <td><strong>Consultorio:</strong> {{$cita->nombre_consult}}</td>
                                    <td><strong>Informado Por:</strong> {{$cita->nombre_ref}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Estudio:</strong> {{$cita->nombre_est}}</td>
                                    <td><strong>Sub-Estudio:</strong> {{$cita->comp}}</td>
                                    <td><strong>Precio:</strong> {{$cita->costo}}</td>
                                    <td><strong>Realizado Por:</strong> {{$cita->id_real}}</td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
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