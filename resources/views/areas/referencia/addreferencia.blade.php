@extends('admin')
@section('content')
<script>
    $(document).ready(function() {
        var options = {
            translation: {
                '0': {pattern: /\d/},
                '1': {pattern: /[1-9]/},
                '9': {pattern: /\d/, optional: true},
                '#': {pattern: /\d/, recursive: true},
                'C': {pattern: /V|v|E|e|J|j/, fallback: 'J'}
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
      $("#name").on("input", function() {
        var RegExPattern = /^[a-zA-ZÁÉÍÓÚñáéíóúÑ]{2,3} [a-zA-ZÁÉÍÓÚñáéíóúÑ]{3,20} [a-zA-ZÁÉÍÓÚñáéíóúÑ]{3,20}/;
        if ((this.value.match(RegExPattern)) && (this.value != '') && (input.validity.patternMismatch)) {

        }else if ((this.value.length < 3) || (this.value.length > 25) || (this.value == '')){
            input.setCustomValidity("EL nombre de la referencia no debe estar vacio y debe contener solo letras y tener un maximo de 20 caracteres");
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
                    .replace(/([1-9]{3})([0-9]{7})$/, '$1-$2');
                });
            }
        });
    });
</script>
    @if(Session::has('message'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ Session::get('message') }}...</div>
    @endif
    <div class="container-fluid with-mt">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header bg-primary text-center">
                        <h4>Nueva Referencia</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('referencias.store')}}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-4 col-md-push-8" {{ $errors->has('tipo_per') ? 'has-error' : '' }}>
                                    <label for="tipo_per" class="text-primary">Tipo de Referencia</label>
                                    <select name="tipo_per" id="tipo_per" required class="form-control" title="EL campo tipo de persona no debe estar vacio">
                                        <option selected value="{{ old('tipo_per') }}">Seleccione el Tipo de Persona</option>
                                        <option value="N">Natural</option>
                                        <option value="J">Juridico</option>
                                    </select>
                                    {!! $errors -> first('tipo_per', '<span class=error>:message</span>') !!}
                                </div>
                                <div class="col-md-4 col-md-push-8"{{ $errors->has('cedula') ? 'has-error' : '' }}>
                                    <label for="Cedula" class="text-primary">Rif Referencia</label>
                                    <input type="text" name="cedula" id="cedula"  class="form-control" required class="form-control" pattern="^([V|v|E|e|J|j]{1})-([0-9]{7,9})-([0-9]{1,1})$" title="El Rif se debe ingresar de la siguiente manera V-00000000-0 ó J-00000000-0" placeholder="Rif Referencia" value="{{ old('cedula') }}">
                                    {!! $errors -> first('cedula', '<span class=error>:message</span>') !!}
                                </div>
                                <div class="col-md-4 col-md-push-8"  {{ $errors->has('name') ? 'has-error' : '' }}>
                                    <label for="name" class="text-primary">Nombre</label>
                                    <input type="text" name="name" required class="form-control" pattern="^([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\']+[\s])+([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])+[\s]?([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])?$" autocomplete="off" title="Formato correcto para el nombre de la referencia interna y externa XXX XXXX XXXX ó XX XXXX XXXX" placeholder="Nombre Referencia" value="{{ old('name') }}">
                                    {!! $errors -> first('name', '<span class=error>:message</span>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 col-md-push-8" {{ $errors->has('telefono') ? 'has-error' : '' }}>
                                    <label for="telefono" class="text-primary">Teléfono</label>
                                    <input type="text" name="telefono" required class="form-control" id="telefono" pattern="^[0-9]{4}-[0-9]{7}$" maxlength="12" title="El formato del teléfono debe ser el siguiente 0424-3333333" placeholder="Teléfono Referencia" value="{{ old('telefono') }}">
                                    {!! $errors -> first('telefono', '<span class=error>:message</span>') !!}
                                </div>
                                <div class="col-md-6 col-md-push-8" {{ $errors->has('tipo') ? 'has-error' : '' }}>
                                    <label for="tipo" class="text-primary">Tipo de Referencia</label>
                                    <select name="tipo" id="tipo" required class="form-control" title="EL campo tipo de referencia no debe estar vacio">
                                        <option selected value="{{ old('tipo') }}">Seleccione Tipo Referencia</option>
                                        <option value="MED">Médicos</option>
                                        <option value="TEC">Técnicos</option>
                                        <option value="EXT">Externas</option>
                                        <option value="GTE">Gerente</option>
                                    </select>
                                    {!! $errors -> first('tipo', '<span class=error>:message</span>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary" onclick="return confirm('Verifique los datos de la Referencia antes de Registrar?')"><i class="fas fa-plus"></i> Registrar</button>
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
@endsection