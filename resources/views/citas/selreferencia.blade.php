@extends('admin')
@section('content')
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
        	<form class="col-12 form-signin" id="frmpac" method="POST" action="{{route('cita')}}" style="background-color: #fff;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;">
        		@csrf
        		@foreach ($paciente as $dato)
        			<br>
        			<div class="bg-warning p-2 col-md-12">Paciente: <strong>{{$dato->nombre}} {{$dato->apellido}}</strong></div>
					<input type="hidden" name="id_pac" value="{{$dato->id}}">
				@endforeach
				<hr>
	        	<h2 class="text-primary text-center">Referencias<span class="glyphicon glyphicon-question-sign" style="float: right;" data-toggle="modal" data-target="#help" title="Ayuda"></span></h2>
		        <hr>
		           <div class="form-group">
					<select class="form-control" id="int" name="id_ref" onchange="vldrefc(this.value);">
						<option selected>Seleccione Referencia Interna</option>
						@foreach ($referencia as $value)
							@if ($value->tipo_ref == 'INT')
								<option value="{{$value->id}}">{{$value->nombre_ref}}</option>
							@endif
						@endforeach
		            </select>
		          </div>
		          <div class="form-group">
		            <select class="form-control" id="ext" name="id_ref" onchange="vldrefc(this.value);">
						<option selected>Seleccione Referencia Externa</option>
						@foreach ($referencia as  $value)
							@if ($value->tipo_ref == 'EXT')
								<option value="{{$value->id}}">{{$value->nombre_ref}}</option>
							@endif
						@endforeach
		            </select>
		          </div>
		          <div class="form-group">
		            <select class="form-control" id="id_real" name="id_real">
						<option selected>Seleccione quien realizará el estudio?</option>
						@foreach ($referencia as  $value)
							@if ($value->tipo_ref == 'INT')
								<option value="{{$value->id}}">{{$value->nombre_ref}}</option>
							@endif
						@endforeach
		            </select>
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