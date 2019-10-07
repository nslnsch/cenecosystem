@extends('admin')
@section('content')
<style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
</style>
<script>
    $(document).ready( function(){
        var mi_primer_grafico ={
            type:"pie",//seleccionamos el tipo de grafico, en este caso es un grafico estilo pie, en esta parte podemos cambiar el tipo de grafico por el que deseamos
            data:{ //le pasamos la data
                datasets:[{
                    data:[{{$con1act}},{{$con2act}},{{$con3act}},{{$con4act}} ],//esta es la data, podemos pasarle variables directamente desde el backend usando blade de la siguiente forma,
                    backgroundColor: [//seleccionamos el color de fondo para cada dato que le enviamos
                      "#04B404","#FFBF00",  "#FF0000",  "#04B4AE",
                    ],
                }],
                labels: [//añadimos las etiquetas correspondientes a la data
                    "Consultorio 1",  "Consultorio 2", "Consultorio 3", "Consultorio 4",
                ]
            },
            options:{//le pasamos como opcion adicional que sea responsivo
                responsive: true,
                title: {
                    display: true,
                    text: 'Estadistica del mes actual por Consultorio'
                }
            }
        }
        var primer_grafico = document.getElementById('grafico').getContext('2d');//seleccionamos el canvas
        window.pie = new Chart(primer_grafico,mi_primer_grafico);//le pasamos el grafico y la data para representarlo
    })
</script>
<script>
    $(document).ready( function(){
        var mi_primer_grafico ={
            type:"pie",//seleccionamos el tipo de grafico, en este caso es un grafico estilo pie, en esta parte podemos cambiar el tipo de grafico por el que deseamos
            data:{ //le pasamos la data
                datasets:[{
                    data:[{{$con1}},{{$con2}},{{$con3}},{{$con4}} ],//esta es la data, podemos pasarle variables directamente desde el backend usando blade de la siguiente forma,
                    backgroundColor: [//seleccionamos el color de fondo para cada dato que le enviamos
                      "#04B404","#FFBF00",  "#FF0000",  "#04B4AE",
                    ],
                }],
                labels: [//añadimos las etiquetas correspondientes a la data
                    "Consultorio 1",  "Consultorio 2", "Consultorio 3", "Consultorio 4",
                ]
            },
            options:{//le pasamos como opcion adicional que sea responsivo
                responsive: true,
                title: {
                    display: true,
                    text: 'Estadistica del mes anterior por Consultorio'
                }
            }
        }
        var primer_grafico = document.getElementById('grafico2').getContext('2d');//seleccionamos el canvas
        window.pie = new Chart(primer_grafico,mi_primer_grafico);//le pasamos el grafico y la data para representarlo
    })
</script>
<div class="container">
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">{{ Session::get('message') }}...</div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="border-radius: 10px;">
                <div class="card-header bg-primary">Informe del Dia
                    <ul class="nav navbar-nav btn d-block float-right ml-auto" style="margin-top: -45px;">
                        @if(count(config('panel.available_languages', [])) > 1)
                            <li class="nav-item dropdown d-md-down-none">
                                <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    {{ strtoupper(app()->getLocale()) }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    @foreach(config('panel.available_languages') as $langLocale => $langName)
                                        <a class="dropdown-item" href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }} ({{ $langName }})</a>
                                    @endforeach
                                </div>
                            </li>
                        @endif
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" title="Notificaciones">
                            <i class="far fa-bell text-light"></i>

                                @if ($notificacion > 0)
                                    <span class="badge badge-pill badge-danger d-inline-block" style="position: relative;top: -10px; left: -10px;">
                                    {{$notificacion}}</span>
                                @else
                                {{-- expr --}}
                                @endif
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                              <div class="dropdown-header text-center">
                                  <strong>Notificaciones</strong>
                              </div>
                                @if ($notificacion > 0)
                                    <a class="dropdown-item" href="{{route("controlcita.index")}}">Citas para hoy<span class="badge badge-success" style="top:12px;">{{$notificacion}}</span></a>
                                @else
                                {{-- expr --}}
                                @endif
                          </div>
                      </li>
                    </ul>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Bienvenid@ <p class="text-danger" style="display: inline-block;">{{Auth::user()->name}}</p>
                    <br><p>Última conexión: {{ Date::parse(Auth::user()->last_login)->format('d/m/Y') }} a las {{ Date::parse(Auth::user()->last_login)->format('h:i:s A') }}</p>
                    <br> <p>{{ Date::parse('now')->format('l j')}} de {{ Date::parse('now')->format('F')}} de {{ Date::parse('now')->format('Y')}} | {{ Date::parse('now')->format('h:i:s A')}} </p>
                    <div class="row">
                        <div class="col-md-6 col-md-push-8 bg-light">
                            <canvas id="grafico"></canvas>
                        </div>
                        <div class="col-md-6 col-md-push-8 bg-light">
                            <canvas id="grafico2"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection