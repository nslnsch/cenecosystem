@extends('admin')
@section('content')
<style type="text/css">
    #dir{
        resize: none;
        min-height: 50px;
    }
</style>
<script>
    $(document).ready(function() {
        $('#Registrar').click(function() {
            var focus;
            var genero = $('#genero').val().trim();
            /**************************************************************************/
            if (genero == 0) {
                alert("Debe Seleccionar el Genero del Paciente");
                focus = document.getElementById("genero").focus();
                return false;
            }else {

            }
        });
    });
    $(document).ready(function() {
        var options = {
            translation: {
                '0': {pattern: /\d/},
                '1': {pattern: /[1-9]/},
                '9': {pattern: /\d/, optional: true},
                '#': {pattern: /\d/, recursive: true},
                'C': {pattern: /V|v|E|e/, fallback: 'V'}
            }
        };
        $("#cedula").mask("C-19999999-9", options);
        $("#cedula").on("input", function (e) {
            var username = $(this).val();
            if (username.length > 9) {
                var cedula = username.substring(2);
                if (cedula > 80000000) {
                    $(this).val('E-' + cedula);
                }
            }
        });
    });
    $(document).ready(function() {
      $("#nombre").on("input", function() {
        var RegExPattern = /^[a-zA-ZÁÉÍÓÚñáéíóúÑ]{3,20}/;
        if ((this.value.match(RegExPattern)) && (this.value != '') && (input.validity.patternMismatch)) {

        }else if ((this.value.length < 3) || (this.value.length > 20) || (this.value == '')){
            input.setCustomValidity("EL nombre no debe estar vacio y debe contener solo letras y tener un minimo de 3 caracteres y un maximo de 20");
        }else{
            input.setCustomValidity("");
        }
      });
    });
    $(document).ready(function() {
      $("#apellido").on("input", function() {
        var RegExPattern = /^[a-zA-ZÁÉÍÓÚñáéíóúÑ]{3,20}/;
        if ((this.value.match(RegExPattern)) && (this.value != '') && (input.validity.patternMismatch)) {

        }else if ((this.value.length < 3) || (this.value.length > 20) || (this.value == '')){
            input.setCustomValidity("EL Apellido no debe estar vacio y debe contener solo letras y tener un minimo de 3 caracteres y un maximo de 20");
        }else{
            input.setCustomValidity("");
        }
      });
    });
    $(document).ready(function(){
        $("#telefono").on({
            "focus": function (event) {
                $(event.target).select();
            },
            "keyup": function (event) {
                $(event.target).val(function (index, value ) {
                    return value.replace(/\D/g, "")
                    .replace(/([0-9]{3})([0-9]{7})$/, '$1-$2');
                });
            }
        });
    });
    $(document).ready(function(){
        $("#dir").on("input", function (e) {
            var direccion = $(this).val();
            if (direccion.length == '') {
                input.setCustomValidity("El campo dirección es requerido");
            }
        });
    });
</script>
<script>
    $(document).ready(function(){
        document.getElementById("nombre").addEventListener("keypress", doNotSubmitFormOnEnterPress);
        document.getElementById("apellido").addEventListener("keypress", doNotSubmitFormOnEnterPress);
            function doNotSubmitFormOnEnterPress(event) {
             if(" Backspace,Tab,ArrowLeft,ArrowRight,áéíóúabcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ".indexOf(event.key) == -1){
              event.preventDefault();
              Swal.fire({
                  type: 'warning',
                  title: 'Este Campo Solo Acepta Letras',
                  showConfirmButton: false,
                });
             };
            };
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
                        <h4>Actualizar Paciente</h4>
                    </div>
                    <div class="card-body">
                        @foreach ($paciente as $pac)
                        <form action="{{route('paciente.update',$pac->id)}}" method="POST">
                            @csrf
                            @method('PUT')

                                <div class="form-group row">
                                    <div class="col-md-3 col-md-push-8" {{ $errors->has('genero') ? 'has-error' : '' }}>
                                        <label class="text-primary" for="genero">Genero</label>
                                        <select name="genero" id="genero" required class="form-control" title="Genero del paciente">
                                            @if ($pac->genero == 'M')
                                              <option selected value="{{$pac->genero}}">Masculino</option>
                                            @elseif($pac->genero == 'F')
                                              <option selected value="{{$pac->genero}}">Femenino</option>
                                            @endif
                                            <option value="F">Femenino</option>
                                            <option value="M">Masculino</option>
                                        </select>
                                        {!! $errors -> first('genero', '<span class=error>:message</span>') !!}
                                    </div>
                                    <div class="col-md-3 col-md-push-8"{{ $errors->has('cedula') ? 'has-error' : '' }}>
                                        <label for="Cedula" class="text-primary">Cédula</label>
                                        <input type="text" name="cedula" id="cedula"  class="form-control" required class="form-control" pattern="^([V|v|E|e]{1})-([0-9]{7,9})-?([0-9]{1,1}?)$" title="La cédula de identidad debe tener el formato V-00000000 sin puntos. En caso de niños sin cédula ingresar V-00000000-0" placeholder="Cédula" value="{{$pac->cedula}}">
                                        {!! $errors -> first('cedula', '<span class=error>:message</span>') !!}
                                    </div>
                                    <div class="col-md-3 col-md-push-8" {{ $errors->has('nombre') ? 'has-error' : '' }}>
                                        <label for="nombre" class="text-primary">Nombre</label>
                                        <input type="text" name="nombre" required class="form-control" id="nombre" pattern="^([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\']+[\s])+([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])+[\s]?([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])?$" minlength="3" maxlength="20" title="EL nombre no debe estar vacio y debe contener solo letras y tener un minimo de 3 caracteres y un maximo de 20" placeholder="Nombre" value="{{$pac->nombre}}">
                                        {!! $errors -> first('nombre', '<span class=error>:message</span>') !!}
                                    </div>
                                    <div class="col-md-3 col-md-push-8" {{ $errors->has('apellido') ? 'has-error' : '' }}>
                                        <label for="apellido" class="text-primary">Apellido</label>
                                        <input type="text" name="apellido" required class="form-control" id="apellido" pattern="^([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\']+[\s])+([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])+[\s]?([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])?$" minlength="3" maxlength="20" title="EL apellido no debe estar vacio y debe contener solo letras y tener un minimo de 3 caracteres y un maximo de 20" placeholder="Apellido" value="{{$pac->apellido}}">
                                        {!! $errors -> first('apellido', '<span class=error>:message</span>') !!}
                                    </div>
                                </div>
                                <!--segunda division-->
                                <div class="form-group row">
                                    <div class="col-md-4 col-md-push-8" {{ $errors->has('telefono') ? 'has-error' : '' }}>
                                        <label for="telefono" class="text-primary">Teléfono</label>
                                        <input type="text" name="telefono" required class="form-control" id="telefono" pattern="^[0-9]{4}-[0-9]{7}$" maxlength="12" title="El formato del telefono debe ser el siguiente 0424-3333333" placeholder="Teléfono" value="{{$pac->telefono}}">
                                        {!! $errors -> first('telefono', '<span class=error>:message</span>') !!}
                                    </div>
                                    <div class="col-md-4 col-md-push-8" {{ $errors->has('fecnac') ? 'has-error' : '' }}>
                                        <label for="fecnac" class="text-primary">Fecha de Nacimiento</label>
                                        <input type="date" name="fecnac" required class="form-control" id="fecnac" pattern="^[a-zA-ZÁÉÍÓÚñáéíóúÑ]{3,20}" minlength="3" maxlength="20" title="El formato de fecha debe ser" placeholder="Fecha Nac" value="{{$pac->fecnac}}">
                                        {!! $errors -> first('fecnac', '<span class=error>:message</span>') !!}
                                    </div>
                                    <div class="col-md-4 col-md-push-8" {{ $errors->has('direccion') ? 'has-error' : '' }}>
                                        <label for="direccion" class="text-primary">Dirección</label>
                                        <textarea id="dir" placeholder="Dirección" name="direccion" required class="form-control" title="El campo dirección es requerido">{{$pac->dirhab}}</textarea>
                                        {!! $errors -> first('direccion', '<span class=error>:message</span>') !!}
                                    </div>
                                </div>
                            @endforeach
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary" onclick="return confirm('Verifique los datos del Paciente antes de Actualizar?')"><i class="fas fa-user-edit"></i> Actualizar</button>
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
@endsection