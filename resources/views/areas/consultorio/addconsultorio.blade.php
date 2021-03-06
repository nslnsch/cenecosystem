@extends('admin')
@section('content')
<script>
    $(document).ready(function() {
      $("#name").on("input", function() {
        var RegExPattern = /^[a-zA-ZÁÉÍÓÚñáéíóúÑ]{11}[1-9]{1}/;
        if ((this.value.match(RegExPattern)) && (this.value != '') && (input.validity.patternMismatch)) {

        }else if ((this.value.length < 12) || (this.value.length > 12) || (this.value == '')){
            input.setCustomValidity("EL nombre del consultorio no debe estar vacio y debe contener solo letras y tener un minimo de 12 caracteres");
        }else{
            input.setCustomValidity("");
        }
      });
    });
    $(document).ready(function() {
      $("#limite").on("input", function() {
        var RegExPattern = /^[1-9]{1,2}/;
        if ((this.value.match(RegExPattern)) && (this.value != '') && (input.validity.patternMismatch)) {

        }else if ((this.value.length < 1) || (this.value.length > 2) || (this.value == '')){
            input.setCustomValidity("EL limite del consultorio no debe estar vacio y debe contener solo numeros y tener  un maximo de 2 caracteres");
        }else{
            input.setCustomValidity("");
        }
      });
    });
</script>
    <div class="container-fluid with-mt">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header bg-primary text-center">
                        <h4>Nuevo Consultorio</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('consultorio.store')}}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-6 col-md-push-8"  {{ $errors->has('name') ? 'has-error' : '' }}>
                                    <label for="name" class="text-primary">Nombre</label>
                                    <input type="text" name="name" required class="form-control" pattern="^[a-zA-ZÁÉÍÓÚñáéíóúÑ]{11}[1-9]{1}" autocomplete="off" title="Nombre del Consultorio">
                                    {!! $errors -> first('name', '<span class=error>:message</span>') !!}
                                </div>
                                <div class="col-md-6 col-md-push-8" {{ $errors->has('limite') ? 'has-error' : '' }}>
                                    <label for="limite" class="text-primary">Limite</label>
                                    <input type="text" name="limite" required class="form-control" pattern="^[1-9]{1,2}" autocomplete="off" title="Limite del Consultorio">
                                    {!! $errors -> first('limite', '<span class=error>:message</span>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary" onclick="return confirm('Verifique los datos del Consultorio antes de Registrar?')" title="Registrar Consultorio"><i class="fas fa-plus"></i> Registrar</button>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ url()->previous() }}" style="text-decoration:none;display:block;margin-left:auto;max-width:30%;" class="btn btn-danger" title="Regresar"><i class="fas fa-undo-alt"></i> Regresar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection