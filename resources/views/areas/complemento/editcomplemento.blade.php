@extends('admin')
@section('content')
<script>
    $(document).ready(function(){
        $("#precio").on({
            "focus": function (event) {
                $(event.target).select();
             },
            "keyup": function (event) {
                $(event.target).val(function (index, value ) {
                   return value.replace(/\D/g, "")
                   .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
                });
             }
        });
    });

    $(document).ready(function() {
    $('#registrar').click(function() {
        var id_est = $('#id_est').val().trim();
        var subestudio = $('#name').val().trim();
        var focus1, focus2;
        if (id_est == 0 || id_est == "" || id_est == null) {
            alert("Debe Completar el campo Codigo del Estudio");
            $('#id_est').css('border-color', '#FF0000');
            focus1 = document.getElementById("id_consult").focus();
        } else if (subestudio == "") {
            alert("Debe completar el campo Nombre del Sub-Estudio");
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
                        <h4>Nuevo Sub-Estudio</h4><i class="far fa-question-circle" style="float: right;margin-top: -30px;font-size: 20px;" data-toggle="modal" data-target="#modal_help_subestudio" title="Ayuda"></i>
                    </div>
                    <div class="card-body">
                        <form action="{{route('subestudios.update',$subestudio->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <div class="col-md-4 col-md-push-8" {{ $errors->has('cod_estudio') ? 'has-error' : '' }}>
                                    <label for="cod_estudio" class="text-primary">Seleccione un Estudio</label>
                                    <select name="cod_estudio" id="cod_estudio" required class="form-control" title="Codigo del Estudio">
                                        <option selected value="{{$nombre_est->id}}">{{$nombre_est->nombre_est}}</option>
                                        @foreach ($estudios as $key => $estudio)
                                            <option value="{{$key}}">{{$estudio}}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors -> first('cod_estudio', '<span class=error>:message</span>') !!}
                                </div>
                                <div class="col-md-4 col-md-push-8"  {{ $errors->has('subestudio') ? 'has-error' : '' }}>
                                    <label for="subestudio" class="text-primary">Nombre del Sub-Estudio</label>
                                    <input type="text" name="subestudio" id="subestudio" required class="form-control" placeholder="Nombre del Sub-Estudio" autocomplete="off" maxlength="25" title="EL nombre del sub-estudio no debe estar vacio y debe contener solo letras,numeros y caracteres especiales" value="{{$subestudio->subestudio}}">
                                    {!! $errors -> first('subestudio', '<span class=error>:message</span>') !!}
                                </div>
                                <div class="col-md-4 col-md-push-8"  {{ $errors->has('precio') ? 'has-error' : '' }}>
                                    <label for="precio" class="text-primary">Precio del Sub-Estudio</label>
                                    <input type="text" name="precio" id="precio" required class="form-control" placeholder="Precio del Sub-Estudio" autocomplete="off" maxlength="25" title="EL Precio del sub-estudio no debe estar vacio y debe contener solo numeros" value="{{$subestudio->precio}}">
                                    {!! $errors -> first('precio', '<span class=error>:message</span>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary" id="registrar" onclick="return confirm('Verifique los datos del SubEstudio antes de Actualizar?')"><i class="fas fa-pen"></i> Actualizar</button>
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
