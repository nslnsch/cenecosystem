@extends('admin')
@section('content')
<script>
    $(document).ready(function() {
      $("#name").on("input", function() {
        var RegExPattern = /^[a-zA-ZÁÉÍÓÚñáéíóúÑ]{2,20}/;
        if ((this.value.match(RegExPattern)) && (this.value != '') && (input.validity.patternMismatch)) {

        }else if ((this.value.length < 2) || (this.value.length > 20) || (this.value == '')){
            input.setCustomValidity("EL nombre del estudio no debe estar vacio y debe contener solo letras de un minimo de 2 caracteres y un maximo de 20");
        }else{
            input.setCustomValidity("");
        }
      });
    });
    $(document).ready(function() {
    $('#registrar').click(function() {
        var id_consult = $('#id_consult').val().trim();
        var nomb_est = $('#name').val().trim();
        var focus1, focus2;
        if (id_consult == 0 || id_consult == "" || id_consult == null) {
            alert("Debe Completar el campo Consultorio");
            $('#id_consult').css('border-color', '#FF0000');
            focus1 = document.getElementById("id_consult").focus();
        } else if (nombr_est == "") {
            alert("Debe completar el campo Nombre del Estudio");
            $('#name').css('border-color', '#FF0000');
            focus2 = document.getElementById("name").focus();
        }else {
            //
        }
    });
});
</script>
    <div class="container-fluid with-mt">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header bg-primary text-center">
                        <h4>Actualizar Estudio</h4><i class="far fa-question-circle" style="float: right;margin-top: -30px;font-size: 20px;" data-toggle="modal" data-target="#modal_help" title="Ayuda"></i>
                    </div>
                    <div class="card-body">
                        <form action="{{route('estudio.update',$estudio->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <div class="col-md-6 col-md-push-8" {{ $errors->has('consultorio') ? 'has-error' : '' }}>
                                    <label for="consultorio" class="text-primary">Seleccione un Consultorio</label>
                                    <select name="consultorio" id="id_consult" required class="form-control" pattern="^[a-zA-ZÁÉÍÓÚñáéíóúÑ]{11}[1-9]{1}" maxlength="2" title="Codigo del Consultorio">
                                    <option selected value="">{{$estudio->id_consult}}</option>
                                        @foreach ($consultorios as $key => $consultorio)
                                        <option value="{{$key}}">{{$consultorio}}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors -> first('consultorio', '<span class=error>:message</span>') !!}
                                </div>
                                <div class="col-md-6 col-md-push-8"  {{ $errors->has('name') ? 'has-error' : '' }}>
                                    <label for="name" class="text-primary">Nombre del Estudio</label>
                                <input type="text" name="name" id="name" required class="form-control" placeholder="Nombre del Estudio" pattern="^[a-zA-ZÁÉÍÓÚñáéíóúÑ]{2,20}" autocomplete="off" title="EL nombre del estudio no debe estar vacio y debe contener solo letras de un minimo de 2 caracteres y un maximo de 20" value="{{$estudio->nombre_est}}">
                                    {!! $errors -> first('name', '<span class=error>:message</span>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary" id="registrar" onclick="return confirm('Verifique los datos del Estudio antes de Actualizar?')"><i class="fas fa-pen"></i> Actualizar</button>
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