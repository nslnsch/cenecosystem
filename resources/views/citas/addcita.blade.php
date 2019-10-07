@extends('admin')
@section('content')
    <style type="text/css">
        #dirhab{
            resize: none;
            min-height: 50px;
            border-width: 0;
        }
        label{
          margin-top: -.94em;
          display: block;
          font-size: 11px;
          color: #429aca;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('#Registrar').click(function() {
                var focus1,focus2,focus3,focus4,focus5,focus6,focus7;
                var sexo = $('#sexo').val().trim();
                var consultorio = $('#consultorio').val().trim();
                var estudio = $('#estudio').val().trim();
                var subestudio = $('#subest').val().trim();
                var precio = $('#precio').val().trim();
                var tipo_cita = $('#tipo_cita').val().trim();
                var fecha = $('#fecha').val().trim();
                /**************************************************************************/
                date = fecha;
                x = new Date();
                vldfecha = date.split("-");
                x.setFullYear(vldfecha[0], vldfecha[1] - 1, vldfecha[2]);
                fechaactual = new Date();
                /**************************************************************************/
                if (sexo == 0) {
                    alert("Debe Seleccionar el Genero del Paciente");
                    focus1 = document.getElementById("sexo").focus();
                    return false;
                }else if (consultorio == 0) {
                    alert("Debe Seleccionar un Consultorio");
                    focus2 = document.getElementById("consultorio").focus();
                    return false;
                }else if (estudio == 0) {
                    alert("Debe Seleccionar un Estudio");
                    focus3 = document.getElementById("estudio").focus();
                    return false;
                }else if (subestudio == 0) {
                    alert("Debe Seleccionar un Sub-Estudio");
                    focus4 = document.getElementById("subest").focus();
                    return false;
                }else if (precio == "") {
                    alert("Debe Seleccionar el Precio del Estudio");
                    focus5 = document.getElementById("precio").focus();
                    return false;
                }else if (tipo_cita == 0) {
                    alert("Debe Seleccionar el Tipo de Cita");
                    focus6 = document.getElementById("tipo_cita").focus();
                    return false;
                }else if (fecha == null || fecha == "") {
                    alert("Debe Seleccionar una Fecha");
                    focus7 = document.getElementById("fecha").focus();
                    return false;
                } else if (x < fechaactual) {
                    alert("fecha invalida! debe ingresar una fecha actual o mayor.");
                    focus7 = document.getElementById("fecha").focus();
                    return false;
                }else {

                }
            });
        });
    </script>
    @inject('consultorios', 'App\Services\Consultorios')
    @if(Session::has('message'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ Session::get('message') }}...</div>
    @endif
    <div class="container-fluid with-mt">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header bg-primary text-center">
                        <h4>Nueva Cita</h4><i class="far fa-question-circle" style="float: right;margin-top: -30px;font-size: 20px;" data-toggle="modal" data-target="#modal_help" title="Ayuda"></i>
                    </div>
                    <div class="card-body">
                    <form method="POST" action="{{route('citas.store')}}">
                        @csrf
                        <h6 class="text-primary">Datos Personales del Paciente</h6>
                        <hr>
                      	@foreach($pacientes as $pac)
                          <div class="form-group row">
                            <input type="hidden" name="id_pac" value="{{$pac->id}}">
                            <div class="col-md-4 col-md-push-8">
                              <label for="ced">Cédula</label>
                              <input class="form-control" disabled id="ced" type="text" placeholder="Cédula" value="{{$pac->cedula}}" title="Cédula del Paciente">
                            </div>
                            <div class="col-md-4 col-md-pull-8">
                              <label for="nom">Nombre</label>
                              <input class="form-control" disabled id="nom" type="text" placeholder="Nombre" title="Nombre del Paciente" value="{{$pac->nombre}}">
                            </div>
                            <div class="col-md-4 col-md-pull-8">
                              <label for="ape">Apellido</label>
                              <input class="form-control" disabled id="ape" type="text" placeholder="Apellido" title="Apellido del Paciente" value="{{$pac->apellido}}">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-md-4 col-md-push-8">
                              <?php $fn = new DateTime($pac->fecnac); $fa = new DateTime(); $edad = $fa->diff($fn); ?>
                              <label for="edad">Edad</label>
                              <input class="form-control" id="edad" name="edad" type="text" placeholder="Edad" value="{{$edad->y}}" title="Edad del Paciente" disabled>
                            </div>
                            <div class="col-md-4 col-md-push-8">
                              <label for="tlf">Teléfono</label>
                              <input class="form-control" disabled id="tlf" type="text" placeholder="Teléfono" title="Teléfono del Paciente" value="{{$pac->telefono}}">
                            </div>
                            <div class="col-md-4 col-md-pull-8">
                              <label for="dirhab">Dirección de Habitación</label>
                              <textarea class="form-control" placeholder="Dirección de habitación" title="Direccón de Habitación del Paciente" disabled id="dirhab">{{$pac->dirhab}}</textarea>
                            </div>
                          </div>
                        @endforeach
                          <h6 class="text-primary">Datos de la Cita</h6>
                          <hr>
                            @foreach ($referencia as $ref)
                              <input type="hidden" name="id_ref" value="{{$ref->id}}">
                              <input type="hidden" name="id_real" value="{{$nombre_real}}">
                            @endforeach
                            <input class="form-control" id="edad" name="edad" type="hidden" placeholder="Edad" value="{{$edad->y}}" title="Edad del Paciente" >
                            <div class="form-group row">
                                <div class="col-md-4 col-md-push-8" {{ $errors->has('sexo') ? 'has-error' : '' }}>
                                    <label for="sexo">Genero</label>
                                    <select name="sexo" id="sexo" required class="form-control" title="Genero del paciente">
                                        <option selected value="">Genero</option>
                                        <option value="F">Femenino</option>
                                        <option value="M">Masculino</option>
                                    </select>
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{!! $errors -> first('sexo', '<span class=error>:message</span>') !!}</strong>
                                    </span>
                                </div>
                                <div class="col-md-4 col-md-push-8">
                                    <label for="consultorio">Consultorio</label>
                                    <select id="consultorio" name="consultorio" class="form-control{{ $errors->has('consultorio') ? ' is-invalid' : '' }}" title="Selecciona un Consultorio">>
                                        @foreach($consultorios->get() as $index => $consultorio)
                                            <option value="{{ $index }}">
                                                {{ $consultorio }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('consultorio'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('consultorio') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-4 col-md-push-8">
                                    <label for="estudio">Estudio</label>
                                    <select id="estudio"  name="estudio" class="form-control{{ $errors->has('estudio') ? ' is-invalid' : '' }}" title="Selecciona un Estudio">><option selected>Selecciona un Estudio</option></select>

                                    @if ($errors->has('estudio'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('estudio') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3 col-md-push-8">
                                    <label for="subest">Sub-estudio</label>
                                    <select id="subest"  name="subest" class="form-control{{ $errors->has('subest') ? ' is-invalid' : '' }}" title="Selecciona un Sub-Estudio"><option selected>Selecciona un Sub-Estudio</option></select>
                                    @if ($errors->has('subest'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('subest') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-3 col-md-push-8">
                                    <label for="precio">Precio</label>
                                    <select id="precio"  name="precio" class="form-control{{ $errors->has('precio') ? ' is-invalid' : '' }}" title="Seleccione Precio"><option selected>Seleccione Precio</option></select>
                                    @if ($errors->has('precio'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('precio') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-3 col-md-push-8" {{ $errors->has('tipo_cita') ? 'has-error' : '' }}>
                                    <label for="tipo_cita">Tipo de Cita</label>
                                    <select name="tipo_cita" id="tipo_cita" required class="form-control" title="Tipo de cita">
                                        <option selected value="">Seleccione Tipo de Cita</option>
                                        <option value="P">Presencial</option>
                                        <option value="T">Telefonica</option>
                                    </select>
                                    {!! $errors -> first('tipo_cita', '<span class=error>:message</span>') !!}
                                </div>
                                <div class="col-md-3 col-md-push-8" {{ $errors->has('fecha') ? 'has-error' : '' }}>
                                    <label for="fecha">Fecha de Registro</label>
                                    <input type="date" name="fecha" id="fecha" class="form-control">
                                    {!! $errors -> first('fecha', '<span class=error>:message</span>') !!}
                                </div>
                            </div>
                          <div class="form-group row">
                              <div class="col-md-6">
                                  <button type="submit" class="btn btn-primary" id="Registrar"  onclick="return confirm('Verifique los datos de la Cita antes de Registrar?')"><i class="fas fa-plus"></i> Registrar</button>
                              </div>
                              <div class="col-md-6">
                                  <a href="{{route('home')}}" style="text-decoration:none;display:block;margin-left:auto;max-width:30%;" class="btn btn-danger"><i class="fas fa-times"></i> Cerrar</a>
                              </div>
                          </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
          </div>
@endsection()
@section('scripts')
  <script>
    $(document).ready(function(){
      $('#consultorio').on('change',function(){
            var consultorio = $(this).val();
            if ($.trim(consultorio) != '') {
                $.get('getestudios/', {consultorio: consultorio}, function (estudios) {
                    $('#estudio').empty();
                    $('#estudio').append("<option value=''>Selecciona un Estudio</option>");

                    $.each(estudios, function (index, value) {
                        $('#estudio').append("<option value='" + index + "'>" + value +"</option>");
                    })
                });
            }
      });
    });
  </script>
  <script>
    $(document).ready(function(){
      $('#estudio').on('change',function(){
            var estudio = $(this).val();
            if ($.trim(estudio) != '') {
                $.get('getsubestudios/', {estudio: estudio}, function (Subestudios) {
                    $('#subest').empty();
                    $('#subest').append("<option value=''>Selecciona un Sub-Estudio</option>");

                    $.each(Subestudios, function (index, value) {
                        $('#subest').append("<option value='" + index + "'>" + value +"</option>");
                    })
                });
            }
      });
    });
  </script>
  <script>
    $(document).ready(function(){
      $('#subest').on('change',function(){
            var subest = $(this).val();
            if ($.trim(subest) != '') {
                $.get('getprecio/', {subest: subest}, function (Subestudiosprecio) {
                    $('#precio').empty();
                    $('#precio').append("<option value=''>Seleccione Precio</option>");

                    $.each(Subestudiosprecio, function (index, value) {
                        $('#precio').append("<option value='" + index + "'>" + value +"</option>");
                    })
                });
            }
      });
    });
  </script>
@endsection()