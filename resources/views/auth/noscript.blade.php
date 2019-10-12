@extends('layouts.app')
@section('content')
    <script type="text/javascript">
      location.href = "{{route('login')}}";
    </script>
    <noscript>
        <div class="container container-style">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card" style="border-radius: 10px;">
                        <div class="card-header text-primary">Iniciar Sesión</div>
                        <div class="card-body">
                            Javascript está deshabilitado en su navegador web.<br />
                            Por favor, para ver correctamente este sitio,<br />
                            <b><i>habilite javascript</i></b>.<br />
                            <br />
                            Para ver las instrucciones para habilitar javascript<br />
                            en su navegador, haga click
                            <a href="http://www.enable-javascript.com/es/"
                            target="_blank">aquí</a>.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </noscript>
@endsection
