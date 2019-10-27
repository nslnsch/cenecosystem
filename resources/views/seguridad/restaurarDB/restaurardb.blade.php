@extends('admin')
@section('content')
    <script>
        $(document).ready(function() {
            $('#enviar').click(function() {
                var data = $('#database').val().trim();
                var url = '../public/restore_database.php';
                if(data == ''){
                    alert('Debe seleccionar un archivo de restauración');
                    return false;
                }else{
                    $.ajax({
                        type: "GET",
                        url: url,
                        data: {'data': data },
                        error: function() {
                            alert("esta fallando");
                        },
                        success: function(r) {
                            $("#resp").fadeIn(1000).html(r);
                        }
                    });
                }
            });
        });
    </script>
    <div class="container container-style">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header bg-primary text-center">
                        <h4>Restaurar Base de Datos</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="#" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
								<div class="col-md-12 col-md-push-8">
                                    <label for="database" class="text-primary">Seleccione un archivo de restauración <strong>.sql</strong></label>
									<input type="file" class="form-control" name="database" id="database" placeholder="Base de datos" required autocomplete="off">
								</div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-primary" id="enviar"><i class="far fa-paper-plane"></i> Restaurar</button>
                                </div>
                                <div class="col-6">
                                      <a href="{{route('home')}}" style="text-decoration: none;"><button type="button" style="display:block;margin-left:auto;" class="btn btn-danger"><i class="fas fa-times"></i> Cerrar</button></a>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div id="resp"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection