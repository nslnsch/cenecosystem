@extends('admin')
@section('content')
    <style type="text/css">
        #dirhab{
            resize: none;
            min-height: 50px;
        }
        label{
          margin-top: -.94em;
          display: block;
          font-size: 11px;
          color: #429aca;
        }
    </style>
    <div class="container-fluid with-mt">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header bg-primary text-center">
                        <h4>Información de la Cita</h4><i class="far fa-question-circle" style="float: right;margin-top: -30px;font-size: 20px;" data-toggle="modal" data-target="#modal_help" title="Ayuda"></i>
                    </div>
                    <div class="card-body">
                        <h6 class="text-primary">Datos Personales del Paciente</h6>
                        <hr>
                          <div class="form-group row">
                            <input type="hidden" name="id_pac" value="{{$pacientes->id}}">
                            <div class="col-md-3 col-md-push-8">
                              @if ($pacientes->genero == 'F')
                                <label for="genero">Genero</label>
                                <input class="form-control" disabled id="genero" type="text" placeholder="Genero" value="Femenino" title="Genero del Paciente">
                              @elseif($pacientes->genero == 'M')
                                <label for="genero">Genero</label>
                                <input class="form-control" disabled id="genero" type="text" placeholder="Genero" value="Masculino" title="Genero del Paciente">
                              @endif
                            </div>
                            <div class="col-md-3 col-md-push-8">
                              <label for="ced">Cédula</label>
                              <input class="form-control" disabled id="ced" type="text" placeholder="Cédula" value="{{$pacientes->cedula}}" title="Cédula del Paciente">
                            </div>
                            <div class="col-md-3 col-md-pull-8">
                              <label for="nom">Nombre</label>
                              <input class="form-control" disabled id="nom" type="text" placeholder="Nombre" title="Nombre del Paciente" value="{{$pacientes->nombre}}">
                            </div>
                            <div class="col-md-3 col-md-pull-8">
                              <label for="ape">Apellido</label>
                              <input class="form-control" disabled id="ape" type="text" placeholder="Apellido" title="Apellido del Paciente" value="{{$pacientes->apellido}}">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-md-4 col-md-push-8">
                              <?php $fn = new DateTime($pacientes->fecnac); $fa = new DateTime(); $edad = $fa->diff($fn); ?>
                              <label for="edad">Edad</label>
                              <input class="form-control" id="edad" name="edad" type="text" placeholder="Edad" value="{{$edad->y}}" title="Edad del Paciente" disabled>
                            </div>
                            <div class="col-md-4 col-md-push-8">
                              <label for="tlf">Teléfono</label>
                              <input class="form-control" disabled id="tlf" type="text" placeholder="Teléfono" title="Teléfono del Paciente" value="{{$pacientes->telefono}}">
                            </div>
                            <div class="col-md-4 col-md-pull-8">
                              <label for="dirhab">Dirección de Habitación</label>
                              <textarea class="form-control" placeholder="Dirección de habitación" title="Direccón de Habitación del Paciente" disabled id="dirhab">{{$pacientes->dirhab}}</textarea>
                            </div>
                          </div>
                          <h6 class="text-primary">Datos de la Cita</h6>
                          <hr>
                            <input class="form-control" id="edad" name="edad" type="hidden" placeholder="Edad" value="{{$edad->y}}" title="Edad del Paciente" >
                            @foreach ($datos as $dato)
                              <div class="form-group row">
                                  <div class="col-md-4 col-md-push-8">
                                      <label for="estado">Estado del Estudio</label>
                                      <input type="text" name="estado" disabled id="estado" required title="Estado del Estudio" value="{{$dato->estado}}" class="form-control">
                                  </div>
                                  <div class="col-md-4 col-md-push-8">
                                      <label for="consultorio">Consultorio</label>
                                      <input type="text" id="consultorio" disabled name="consultorio" title="Consultorio" value="{{$dato->nombre_consult}}" class="form-control">
                                  </div>
                                  <div class="col-md-4 col-md-push-8">
                                      <label for="estudio">Estudio</label>
                                      <input type="text" id="estudio" disabled name="estudio" title="Estudio" value="{{$dato->nombre_est}}" class="form-control">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <div class="col-md-3 col-md-push-8">
                                      <label for="subest">Sub-estudio</label>
                                      <input type="text" id="subest" disabled name="subest" title="Sub-Estudio" value="{{$dato->comp}}" class="form-control">
                                  </div>
                                  <div class="col-md-2 col-md-push-8">
                                      <label for="precio">Precio</label>
                                      <input type="text" id="precio" disabled name="precio" title="Precio del Estudio" value="{{$dato->costo}}" class="form-control">
                                  </div>
                                  <div class="col-md-2 col-md-push-8">
                                      @if ($dato->tipo_cita == 'P')
                                        <label for="tipo_cita">Tipo de Cita</label>
                                        <input type="text" name="tipo_cita" id="tipo_cita" disabled required title="Tipo de cita" value="Presencial" class="form-control">
                                      @elseif($dato->tipo_cita == 'T')
                                        <label for="tipo_cita">Tipo de Cita</label>
                                        <input type="text" name="tipo_cita" id="tipo_cita" disabled required title="Tipo de cita" value="Telefonica" class="form-control">
                                      @endif
                                  </div>
                                  <div class="col-md-2 col-md-push-8">
                                      <label for="fecha">Fecha de Registro</label>
                                      <input type="text" disabled name="fecha" id="fecha" value="{{ Date::parse($dato->fecha)->format('d/m/Y')}}" class="form-control" title="fecha de registro">
                                  </div>
                                  <div class="col-md-3 col-md-push-8">
                                    <label for="recibido">Recibido Por</label>
                                    <input type="text" id="recibido" disabled name="recibido" title="Recibido Por:" value="{{$dato->recibido}}" class="form-control">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <div class="col-md-4 col-md-push-8">
                                      <label for="id_ref">Informado Por</label>
                                      <input type="text" id="id_ref" disabled name="id_ref" title="Informado Por" value="{{$dato->nombre_ref}}" class="form-control">
                                  </div>
                                  <div class="col-md-4 col-md-push-8">
                                      <label for="id_real">Realizado Por</label>
                                      <input type="text" id="id_real" disabled name="id_real" title="Realizado Por" value="{{$dato->id_real}}" class="form-control">
                                  </div>
                                  <div class="col-md-4 col-md-push-8">
                                    <label for="edo_pago">Estado de Pago</label>
                                    <input type="text" id="edo_pago" disabled name="edo_pago" title="Estado de Pago" value="{{$dato->estado_pago}}" class="form-control">
                                  </div>
                              </div>
                            @endforeach
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <a href="{{ url()->previous() }}" class="btn btn-danger d-block float-right ml-auto"><i class="fas fa-undo-alt"></i> Regresar</a>
                                </div>
                            </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
@endsection()