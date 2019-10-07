@extends('admin')
@section('content')
<script>
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
    <div class="container-fluid with-mt">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header text-primary text-center">
                        <h4>Actualizar Referencia</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('referencias.update',$referencia->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <div class="col-md-4 col-md-push-8"  {{ $errors->has('name') ? 'has-error' : '' }}>
                                    <label for="name" class="text-primary">Nombre</label>
                                    <input type="text" name="name" required class="form-control" pattern="^([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\']+[\s])+([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])+[\s]?([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])?$" autocomplete="off" title="Formato correcto para el nombre de la referencia interna DRA XXXX XXXX ó DR XXXX XXXX" placeholder="Nombre Referencia" value="{{$referencia->nombre_ref}}">
                                    {!! $errors -> first('name', '<span class=error>:message</span>') !!}
                                </div>
                                <div class="col-md-4 col-md-push-8" {{ $errors->has('telefono') ? 'has-error' : '' }}>
                                    <label for="telefono" class="text-primary">Teléfono</label>
                                    <input type="text" name="telefono" required class="form-control" id="telefono" pattern="^[0-9]{4}-[0-9]{7}$" maxlength="12" title="El formato del telefono debe ser el siguiente 0424-3333333" placeholder="Teléfono Referencia" value="{{$referencia->telefono_ref}}">
                                    {!! $errors -> first('telefono', '<span class=error>:message</span>') !!}
                                </div>
                                <div class="col-md-4 col-md-push-8" {{ $errors->has('tipo') ? 'has-error' : '' }}>
                                    <label for="tipo" class="text-primary">Tipo de Referencia</label>
                                    <select name="tipo" id="tipo" required class="form-control" id="telefono" pattern="^[a-zA-ZÁÉÍÓÚñáéíóúÑ]{7}" maxlength="7" title="EL campo tipo de referenciano debe estar vacio">
                                            <option selected value="{{$referencia->tipo_ref}}">{{$referencia->tipo_ref}}</option>
                                            @if ($referencia->tipo_ref == 'INT')
                                                <option value="EXT">Externa</option>
                                            @elseif($referencia->tipo_ref == 'EXT')
                                                <option value="INT">Interna</option>
                                            @elseif($referencia->tipo_ref == 'GTE')
                                                <option value="GTE">Gerente</option>
                                            @endif
                                    </select>
                                    {!! $errors -> first('tipo', '<span class=error>:message</span>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary" onclick="return confirm('Verifique los datos de la Referencia antes de Actualizar?')"><i class="fas fa-pen"></i></i> Actualizar</button>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{route('referencias.index')}}" style="text-decoration:none;display:block;margin-left:auto;max-width:30%;" class="btn btn-danger"><i class="fas fa-undo-alt"></i> Regresar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection