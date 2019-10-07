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
            <h3>REPORTE DE BITACORA</h3>
            <hr>
            <header>
                <p>Reporte de Bitacora dia: {{ Date::parse($request_fecha)->format('d/m/Y')}} </p>
            </header>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover table-striped table-sm">
                        <thead style="font-size: 14px;">
                            <tr>
                                <th scope="col">Codigo Usuario</th>
                                <th scope="col">IP</th>
                                <th scope="col">log</th>
                                <th scope="col">Fecha</th>
                            </tr>
                        </thead>
                        @foreach ($query as $dato)
                            <tbody>
                                <tr style="font-size: 12px;">
                                    <td>{{$dato->id_user}}</td>
                                    <td>{{$dato->ip}}</td>
                                    <td>{{$dato->log}}</td>
                                    <td>{{ Date::parse($dato->fecha)->format('d/m/Y')}}</td>
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

