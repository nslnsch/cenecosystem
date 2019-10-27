<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Reporte</title>
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
        <style>
            h3{
                text-align: center;
                text-transform: uppercase;
                color: #dc143c;
            }
            #rif{
                font-size: 11px;
            }
            hr{
                color: #dc143c;
            }
            footer {
                position: fixed;
                width: 100%;
                height: 30px;
                bottom: 0;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <header>
                <img src="{{asset('img/ceneco-logo.png')}}" class="imgs" alt="image" width="180" height="55"><br><label id="rif">Rif:J-09038808-7</label>
            </header>
            <h3>CONTROL DE CITAS</h3>
            <hr>
            <header>
                <p>Reporte de Citas dia: {{$today}} </p>
                <p>Total de Pacientes Atendidos: {{$atend}} </p>
            </header>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover table-striped table-sm">
                        <thead style="font-size: 14px;">
                            <tr>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Estudio</th>
                                <th scope="col">Sub-Estudio</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Resultado</th>
                                <th scope="col">E.Pago</th>
                            </tr>
                        </thead>
                        @foreach ($query as $dato)
                            <tbody>
                                <tr style="font-size: 12px;">
                                    <td>{{$dato->nombre}}</td>
                                    <td>{{$dato->apellido}}</td>
                                    <td>{{$dato->nombre_est}}</td>
                                    <td>{{$dato->comp}}</td>
                                    <td>{{number_format($dato->costo)}} Bs.</td>
                                    <td>{{$dato->estado}}</td>
                                    <td>{{$dato->estado_pago}}</td>
                                </tr>
                            </tbody>
                         @endforeach
                    </table>
                </div>
            </div>
            <footer>
                <div class="row">
                    <div class="col-md-2 text-right">
                        <p>_________________</p>
                        <p style="margin-top: -15px; font-size: 12px;">Firma del Gerente</p>
                        <p style="margin-top: -15px; font-size: 12px;">{{$gte}}</p>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>

