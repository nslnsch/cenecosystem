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
            $('#Actualizar').click(function() {
                var focus2,focus3,focus4,focus5,focus6,focus7,focus8,focus9;
                var consultorio = $('#consultorio').val().trim();
                var estudio = $('#estudio').val().trim();
                var subestudio = $('#subest').val().trim();
                var precio = $('#precio').val().trim();
                var tipo_cita = $('#tipo_cita').val().trim();
                var fecha = $('#fecha').val().trim();
                var id_real = $('#id_real').val().trim();
                var edo_pago = $('#edo_pago').val().trim();
                /**************************************************************************/
                date = fecha;
                x = new Date();
                vldfecha = date.split("-");
                x.setFullYear(vldfecha[0], vldfecha[1] - 1, vldfecha[2]);
                fechaactual = new Date();
                /**************************************************************************/
                if (consultorio == 0) {
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
                }else if (x < fechaactual) {
                    alert("fecha invalida! debe ingresar una fecha actual o mayor.");
                    focus7 = document.getElementById("fecha").focus();
                    return false;
                }else if (id_real == 0) {
                    alert("Debe seleccionar quien realizará el estudio");
                    focus8 = document.getElementById("id_real").focus();
                    return false;
                }else if (edo_pago == 0) {
                    alert("Debe seleccionar un estado de pago");
                    focus9 = document.getElementById("edo_pago").focus();
                    return false;
                }else {

                }
            });
        });
    </script>
    <!----//seccion de busqueda quien realiza el estudio------------------------------------------>
    <script>
      $(document).ready(function(){
        $('.real').click(function () {
          var tipo_ref = $('input:radio[name=ref2]:checked').val();
          if ($.trim(tipo_ref) != '') {
                    $.get('../../getreferencia/', {tipo_ref: tipo_ref}, function (referencia) {
                        $('#referencia2').empty();
                        $('#referencia2').append("<option value=''>Quien Realiza el Estudio</option>");

                        $.each(referencia, function (index, value) {
                            $('#referencia2').append("<option value='" + index + "'>" + value +"</option>");
                        });
                    });
                }
        });
      });
    </script>
    <script>
      $(document).ready(function(){
        $('#search2').keyup(function () {
          var buscar = $('#search2').val();
          var tipo_ref = $('input:radio[name=ref2]:checked').val();
          if ($.trim(tipo_ref) != '') {
                    $.get('../../getfiltrar/', {tipo_ref: tipo_ref,buscar: buscar}, function (buscador) {
                        $('#referencia2').empty();
                        $('#referencia2').append("<option value=''>Quien Realiza el Estudio</option>");

                        $.each(buscador, function (index, value) {
                            $('#referencia2').append("<option value='" + index + "'>" + value +"</option>");
                        });
                    });
                }
        });
      });
    </script>
    <!-------------validacion de listas desplegables------------------------------------------------>
    <script>
      $(document).ready(function(){
            $("#frmeditcita").submit(function() {
              var focus1;
                var ref2 = $('#referencia2').val().trim();
                if(ref2 == 0){
                    swal({
                      type: "info",
                      title: "Debe seleccionar quien realizará el estudio!",
                      showConfirmButton: false,
                      timer: 3000
                    });
                    focus1 = document.getElementById("referencia2").focus();
                    return false;
                }else{}
            });
      });
    </script>
    <!---------------------------------------------------------------------------------------------->
    @inject('consultorios', 'App\Services\Consultorios')
    <div class="container-fluid with-mt">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header bg-primary text-center">
                        <h4>Actualizar Cita</h4><i class="far fa-question-circle" style="float: right;margin-top: -30px;font-size: 20px;" data-toggle="modal" data-target="#modal_help" title="Ayuda"></i>
                    </div>
                    <div class="card-body">
                    <form method="POST" id="frmeditcita" action="{{route('citas.update',$datocita->id)}}">
                        @csrf
                        @method('PUT')
                        <h6 class="text-primary">Datos Personales del Paciente</h6>
                        <hr>
                          <div class="form-group row">
                            <input type="hidden" name="id_pac" value="{{$datocita->id}}">
                            <div class="col-md-3 col-md-push-8">
                              @if ($datocita->genero == 'F')
                                <label for="genero">Genero</label>
                                <input class="form-control" disabled id="genero" type="text" placeholder="Genero" value="{{$datocita->genero}}" title="Genero del Paciente">
                              @elseif($datocita->genero == 'M')
                                <label for="genero">Genero</label>
                                <input class="form-control" disabled id="genero" type="text" placeholder="Genero" value="{{$datocita->genero}}" title="Genero del Paciente">
                              @endif
                            </div>
                            <div class="col-md-3 col-md-push-8">
                              <label for="ced">Cédula</label>
                              <input class="form-control" disabled id="ced" type="text" placeholder="Cédula" value="{{$datocita->cedula}}" title="Cédula del Paciente">
                            </div>
                            <div class="col-md-3 col-md-pull-8">
                              <label for="nom">Nombres</label>
                              <input class="form-control" disabled id="nom" type="text" placeholder="Nombre" title="Nombre del Paciente" value="{{$datocita->nombre}}">
                            </div>
                            <div class="col-md-3 col-md-pull-8">
                              <label for="ape">Apellidos</label>
                              <input class="form-control" disabled id="ape" type="text" placeholder="Apellido" title="Apellido del Paciente" value="{{$datocita->apellido}}">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-md-4 col-md-push-8">
                              <?php $fn = new DateTime($datocita->fecnac); $fa = new DateTime(); $edad = $fa->diff($fn); ?>
                              <label for="edad">Edad</label>
                              <input class="form-control" id="edad" name="edad" type="text" placeholder="Edad" value="{{$edad->y}}" title="Edad del Paciente" disabled>
                            </div>
                            <div class="col-md-4 col-md-push-8">
                              <label for="tlf">Teléfono</label>
                              <input class="form-control" disabled id="tlf" type="text" placeholder="Teléfono" title="Teléfono del Paciente" value="{{$datocita->telefono}}">
                            </div>
                            <div class="col-md-4 col-md-pull-8">
                              <label for="dirhab">Dirección de Habitación</label>
                              <textarea class="form-control" placeholder="Dirección de habitación" title="Direccón de Habitación del Paciente" disabled id="dirhab">{{$datocita->dirhab}}</textarea>
                            </div>
                          </div>
                          <h6 class="text-primary">Datos de la Cita</h6>
                          <hr>
                            <input class="form-control" id="edad" name="edad" type="hidden" placeholder="Edad" value="{{$edad->y}}" title="Edad del Paciente" >
                            <div class="form-group row">
                                <div class="col-md-4 col-md-push-8">
                                    <label for="consultorio">Consultorio</label>
                                    <select id="consultorio" name="consultorio" class="form-control{{ $errors->has('consultorio') ? ' is-invalid' : '' }}" title="Selecciona un Consultorio">
                                      <option selected>{{$datocita->nombre_consult}}</option>
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
                                    <select id="estudio"  name="estudio" class="form-control{{ $errors->has('estudio') ? ' is-invalid' : '' }}" title="Selecciona un Estudio">><option selected value="{{$datocita->id}}">{{$datocita->nombre_est}}</option></select>

                                    @if ($errors->has('estudio'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('estudio') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-4 col-md-push-8">
                                    <label for="subest">Sub-estudio</label>
                                    <select id="subest"  name="subest" class="form-control{{ $errors->has('subest') ? ' is-invalid' : '' }}" title="Selecciona un Sub-Estudio"><option selected>{{$datocita->comp}}</option></select>
                                    @if ($errors->has('subest'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('subest') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4 col-md-push-8">
                                    <label for="precio">Precio</label>
                                    <select id="precio"  name="precio" class="form-control{{ $errors->has('precio') ? ' is-invalid' : '' }}" title="Seleccione Precio"><option selected value="{{$datocita->costo}}">{{number_format($datocita->costo)}} Bs.</option></select>
                                    @if ($errors->has('precio'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('precio') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-4 col-md-push-8" {{ $errors->has('tipo_cita') ? 'has-error' : '' }}>
                                    <label for="tipo_cita">Tipo de Cita</label>
                                    <select name="tipo_cita" id="tipo_cita" required class="form-control" title="Tipo de cita">
                                        @if ($datocita->tipo_cita == 'P')
                                          <option selected value="{{$datocita->tipo_cita}}">Presencial</option>
                                        @elseif($datocita->tipo_cita == 'T')
                                          <option selected value="{{$datocita->tipo_cita}}">Telefonica</option>
                                        @endif
                                        <option value="P">Presencial</option>
                                        <option value="T">Telefonica</option>
                                    </select>
                                    {!! $errors -> first('tipo_cita', '<span class=error>:message</span>') !!}
                                </div>
                                <div class="col-md-4 col-md-push-8" {{ $errors->has('fecha') ? 'has-error' : '' }}>
                                    <label for="fecha">Fecha de Registro</label>
                                    <input type="date" name="fecha" id="fecha" class="form-control" value="{{$datocita->fecha}}">
                                    {!! $errors -> first('fecha', '<span class=error>:message</span>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 col-md-push-8">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input real" id="customRadio1" name="ref2" value="MED">
                                                <label class="custom-control-label" for="customRadio1">Médicos</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" class="custom-control-input real" id="customRadio2" name="ref2" value="TEC">
                                                <label class="custom-control-label" for="customRadio2">Técnicos</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="text" class="form-controller" id="search2" maxlength="25" name="search" autofocus placeholder="Buscar" title="buscar referencias" autocomplete="off" style="outline: 0;border-width: 0;">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <label for="id_real">Quien realiza el estudio
                                                <select id="referencia2" name="id_real" class="form-control" title="Selecciona una Referencia" onchange="vldref(this.value);"><option selected value="{{$referencia->id}}">{{$referencia->nombre_ref}}</option></select></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-md-push-8" {{ $errors->has('edo_pago') ? 'has-error' : '' }}>
                                    <label for="edo_pago">Estado de Pago</label>
                                    <select name="edo_pago" id="edo_pago" required class="form-control" title="Estado de Pago">
                                      <option selected value="{{$datocita->estado_pago}}">{{$datocita->estado_pago}}</option>
                                      <option value="Por Pagar">Por Pagar</option>
                                      <option value="Pagado">Pagado</option>
                                    </select>
                                    {!! $errors -> first('edo_pago', '<span class=error>:message</span>') !!}
                                </div>
                            </div>
                          <div class="form-group row">
                              <div class="col-md-6">
                                  <button type="submit" class="btn btn-primary" id="Actualizar"  onclick="return confirm('Verifique los datos de la Cita antes de Actualizar?')"><i class="fas fa-pen"></i> Actualizar
                                  </button>
                              </div>
                              <div class="col-md-6">
                                  <a href="{{ url()->previous() }}" style="text-decoration:none;display:block;margin-left:auto;max-width:30%;" class="btn btn-danger"><i class="fas fa-undo-alt"></i> Regresar</a>
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
                $.get('../../getestudios/', {consultorio: consultorio}, function (estudios) {
                    $('#estudio').empty();
                    $('#estudio').append("<option value=''>Seleccione un Estudio</option>");

                    $.each(estudios, function (index, value) {
                        $('#estudio').append("<option value='" + index + "'>" + value +"</option>");
                    });
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
                $.get('../../getsubestudios/', {estudio: estudio}, function (Subestudios) {
                    $('#subest').empty();
                    $('#subest').append("<option value=''>Selecciona un Sub-Estudio</option>");

                    $.each(Subestudios, function (index, value) {
                        $('#subest').append("<option value='" + index + "'>" + value +"</option>");
                    });
                });
            }
      });
    });
  </script>
  <script>
    $(document).ready(function(){
      $('#subest').on('change',function(){
            var subest = $(this).val();
            function number_format(amount, decimals) {
                amount += ''; // por si pasan un numero en vez de un string
                amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto
                decimals = decimals || 0; // por si la variable no fue fue pasada
                // si no es un numero o es igual a cero retorno el mismo cero
                if (isNaN(amount) || amount === 0)
                    return parseFloat(0).toFixed(decimals);
                // si es mayor o menor que cero retorno el valor formateado como numero
                amount = '' + amount.toFixed(decimals);
                var amount_parts = amount.split('.'),
                    regexp = /(\d+)(\d{3})/;
                while (regexp.test(amount_parts[0]))
                    amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');
                return amount_parts.join('.');
            }
            if ($.trim(subest) != '') {
                $.get('../../getprecio/', {subest: subest}, function (Subestudiosprecio) {
                    $('#precio').empty();
                    $('#precio').append("<option value=''>Seleccione Precio</option>");

                    $.each(Subestudiosprecio, function (index, value) {
                        $('#precio').append("<option value='" + index + "'>" + number_format(value) +' Bs.'+"</option>");
                    });
                });
            }
      });
    });
  </script>
@endsection()