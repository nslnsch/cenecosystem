@extends('admin')
@section('content')
<style type="text/css">
    #dir{
        width: 273px;
        resize: none;
        min-height: 50px;
    }
</style>
<script>
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

</script>
    @if(Session::has('message'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ Session::get('message') }}...</div>
    @endif
    <div class="container-fluid with-mt">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header bg-primary text-center">
                        <h4>Ingrese Cédula del Paciente</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('edit_pac_upd')}}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-12 col-md-push-8"{{ $errors->has('cedula') ? 'has-error' : '' }}>
                                    <label for="Cedula" class="text-primary">Cedula</label>
                                    <input type="text" name="cedula" id="cedula"  class="form-control" required class="form-control" pattern="^([V|v|E|e]{1})-([0-9]{7,9})-?([0-9]{0,9}?)$" title="La cédula de identidad debe tener el formato V-00000000 sin puntos. En caso de niños sin cédula ingresar V-00000000-0" placeholder="Cédula" autocomplete="off" autofocus>
                                    {!! $errors -> first('cedula', '<span class=error>:message</span>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Consultar</button>
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