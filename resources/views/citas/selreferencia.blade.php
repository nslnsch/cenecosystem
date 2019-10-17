@extends('admin')
@section('content')
<!----//primera seccion de busqueda------------------------------------------------------------->
<script>
	$(document).ready(function(){
		$('.info').click(function () {
			var tipo_ref = $('input:radio[name=ref]:checked').val();
			if ($.trim(tipo_ref) != '') {
                $.get('getreferencia/', {tipo_ref: tipo_ref}, function (referencia) {
                    $('#referencia').empty();
                    $('#referencia').append("<option value=''>Selecciona una Referencia</option>");

                    $.each(referencia, function (index, value) {
                        $('#referencia').append("<option value='" + index + "'>" + value +"</option>");
                    })
                });
            }
		});
	});
</script>
<script>
	$(document).ready(function(){
		$('#search').keyup(function () {
			var buscar = $('#search').val();
			var tipo_ref = $('input:radio[name=ref]:checked').val();
			if ($.trim(tipo_ref) != '') {
                $.get('getfiltrar/', {tipo_ref: tipo_ref,buscar: buscar}, function (buscador) {
                    $('#referencia').empty();
                    $('#referencia').append("<option value=''>Selecciona una Referencia</option>");

                    $.each(buscador, function (index, value) {
                        $('#referencia').append("<option value='" + index + "'>" + value +"</option>");
                    })
                });
            }
		});
	});
</script>
<!----//segunda seccion de busqueda------------------------------------------------------------->
<script>
	$(document).ready(function(){
		$('.real').click(function () {
			var tipo_ref = $('input:radio[name=ref2]:checked').val();
			if ($.trim(tipo_ref) != '') {
                $.get('getreferencia/', {tipo_ref: tipo_ref}, function (referencia) {
                    $('#referencia2').empty();
                    $('#referencia2').append("<option value=''>Quien Realiza el Estudio</option>");

                    $.each(referencia, function (index, value) {
                        $('#referencia2').append("<option value='" + index + "'>" + value +"</option>");
                    })
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
                $.get('getfiltrar/', {tipo_ref: tipo_ref,buscar: buscar}, function (buscador) {
                    $('#referencia2').empty();
                    $('#referencia2').append("<option value=''>Quien Realiza el Estudio</option>");

                    $.each(buscador, function (index, value) {
                        $('#referencia2').append("<option value='" + index + "'>" + value +"</option>");
                    })
                });
            }
		});
	});
</script>
<!-------------validacion de listas desplegables------------------------------------------------>
<script>
	$(document).ready(function(){
        $("#frmref").submit(function() {
        	var focus,focus1;
            var ref = $('#referencia').val().trim();
            var ref2 = $('#referencia2').val().trim();
            if (ref == 0){
                swal({
            		type: "info",
            		title: "Debe seleccionar una referencia valida!",
            		showConfirmButton: false,
            		timer: 3000
        		});
                focus = document.getElementById("referencia").focus();
                return false;
            }else if(ref2 == 0){
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
    <div class="container-fluid with-mt">
    	<div class="row">
	      <div class="table-responsive" style="color: #fff;border-radius: 10px;">
	          <table class="table">
	            <thead>
	              <tr class="bg-primary">
	                <th>Disponibilidad</th>
	                <th style="text-align: center;">Consultorio 1 </th>
	                <th style="text-align: center;">Consultorio 2 </th>
	                <th style="text-align: center;">Consultorio 3 </th>
	                <th style="text-align: center;">Consultorio 4 </th>
	              </tr>
	              <tr class="bg-inverse" style="background-color: #fff;">
	              	<th>Fecha: {{ Date::parse('now')->format('d/m/Y')}}</th>
	              		@if (($c1 == 'Consultorio1')&&($cons1 >= $limit_c1))
	              			<th style="text-align: center;" class="text-danger" title="El consultorio llego al limite">{{$cons1}}/{{$limit_c1}}</th>
	              		@else
	              			<th style="text-align: center;">{{$cons1}}/{{$limit_c1}}</th>
	              		@endif
	              		@if (($c2 == 'Consultorio2')&&($cons2 >= $limit_c2))
	              			<th style="text-align: center;" class="text-danger" title="El consultorio llego al limite">{{$cons2}}/{{$limit_c2}}</th>
	              		@else
	              			<th style="text-align: center;">{{$cons2}}/{{$limit_c2}}</th>
	              		@endif
						@if (($c3 == 'Consultorio3')&&($cons3 >= $limit_c3))
							<th style="text-align: center;" class="text-danger" title="El consultorio llego al limite">{{$cons3}}/{{$limit_c3}}</th>
						@else
	              			<th style="text-align: center;">{{$cons3}}/{{$limit_c3}}</th>
						@endif
						@if (($c4 == 'Consultorio4')&&($cons4 >= $limit_c4))
							<th style="text-align: center;" class="text-danger" title="El consultorio llego al limite">{{$cons4}}/{{$limit_c4}}</th>
						@else
	              			<th style="text-align: center;">{{$cons4}}/{{$limit_c4}}</th>
						@endif
	              </tr>
	            </thead>
	          </table>
	      </div>
    	</div>
		<div class="row">
        	<form class="col-12 form-signin" id="frmref" method="POST" action="{{route('cita')}}" style="background-color: #fff;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;">
        		@csrf
        		@foreach ($paciente as $dato)
        			<br>
        			<div class="bg-warning p-2 col-md-12">Paciente: <strong>{{$dato->nombre}} {{$dato->apellido}}</strong></div>
					<input type="hidden" name="id_pac" value="{{$dato->id}}">
				@endforeach
				<hr>
	        	<h2 class="text-primary text-center">Referencias<span class="glyphicon glyphicon-question-sign" style="float: right;" data-toggle="modal" data-target="#help" title="Ayuda"></span></h2>
		        <hr>
		           <div class="form-group row">
		           	<div class="col-md-2 col-md-push-8">
		           		<div class="custom-control custom-radio custom-control-inline">
					    	<input type="radio" class="custom-control-input info" id="customRadio" name="ref" value="MED" required>
					    	<label class="custom-control-label" for="customRadio">Médicos</label>
					  	</div>
		           	</div>
		           	<div class="col-md-2 col-md-push-8">
						<div class="custom-control custom-radio custom-control-inline">
						    <input type="radio" class="custom-control-input info" id="customRadio3" name="ref" value="EXT" required>
						    <label class="custom-control-label" for="customRadio3">Referencia Externa</label>
						 </div>
					</div>
					<div class="col-md-4 col-md-push-8">
					  <div class="custom-control custom-radio custom-control-inline">
					  	<input type="text" class="form-controller" id="search" maxlength="25" name="search" autofocus placeholder="Buscar" title="buscar referencias" autocomplete="off" style="outline: 0;border-width: 0;">
					  </div>
					</div>
					<div class="col-md-4 col-md-push-8">
					  <div class="custom-control custom-radio custom-control-inline">
						<select id="referencia"  name="referencia" class="form-control" title="Selecciona una Referencia" onchange="vldref(this.value);"><option selected>Selecciona una Referencia</option></select>
					  </div>
					</div>
		          </div>
		          <hr>
		          <div class="form-group row">
		           	<div class="col-md-2 col-md-push-8">
		           		<div class="custom-control custom-radio custom-control-inline">
					    	<input type="radio" class="custom-control-input real" id="customRadio1" name="ref2" value="MED" required>
					    	<label class="custom-control-label" for="customRadio1">Médicos</label>
					  	</div>
		           	</div>
		           	<div class="col-md-2 col-md-push-8">
						<div class="custom-control custom-radio custom-control-inline">
						    <input type="radio" class="custom-control-input real" id="customRadio2" name="ref2" value="TEC" required>
						    <label class="custom-control-label" for="customRadio2">Técnicos</label>
						 </div>
					</div>
					<div class="col-md-4 col-md-push-8">
					  <div class="custom-control custom-radio custom-control-inline">
					  	<input type="text" class="form-controller" id="search2" maxlength="25" name="search" autofocus placeholder="Buscar" title="buscar referencias" autocomplete="off" style="outline: 0;border-width: 0;">
					  </div>
					</div>
					<div class="col-md-4 col-md-push-8">
					  <div class="custom-control custom-radio custom-control-inline">
						<select id="referencia2" name="id_real"  name="referencia" class="form-control" title="Selecciona una Referencia" onchange="vldref(this.value);"><option selected>Quien Realiza el Estudio</option></select>
					  </div>
					</div>
		          </div>
		          <hr>
		          <div class="form-group row">
		            <div class="col-6">
		                <button type="submit"  style="display: block; margin-right: auto;" class="btn btn-md btn-primary" id="enviar" title="Enviar Referencia" onclick="return vldref()"><i class="far fa-paper-plane"></i> Enviar</button>
		            </div>
		            <div class="col-6">
		                  <a href="{{route('home')}}" style="text-decoration:none;display:block;margin-left:auto;max-width:30%;" class="btn btn-danger"><i class="fas fa-times"></i> Cerrar</a>
		            </div>
		          </div>
	        </form>
   		 </div>
   	</div>
@endsection