<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ceneco S.A</title>
    <link rel="shortcut icon" href="img/cenecoicon.png">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
	<!--styles-->
	<link href="{{asset('css/laila.css')}}" rel="stylesheet">
	<link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/styles.css')}}" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!--Icons Font Awesome-->
    <link href="{{asset('css/all.css')}}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('js/block-bt.js') }}"></script>
	<style type="text/css">
		.navbar{
		    border-radius: 0px;
		    padding: 0px;
		}
		.navbar-brand{
		    margin-left: -7px;
		    margin-top: -1px;
		    padding-top: 0px;
		    padding-bottom: 0px;
		}
		.dropdown-menu{
		    margin-top: 9px;

			background: rgba(76,76,76,1);
			background: -moz-linear-gradient(left, rgba(76,76,76,1) 0%, rgba(43,43,43,0.96) 100%);
			background: -webkit-gradient(left top, right top, color-stop(0%, rgba(76,76,76,1)), color-stop(100%, rgba(43,43,43,0.96)));
			background: -webkit-linear-gradient(left, rgba(76,76,76,1) 0%, rgba(43,43,43,0.96) 100%);
			background: -o-linear-gradient(left, rgba(76,76,76,1) 0%, rgba(43,43,43,0.96) 100%);
			background: -ms-linear-gradient(left, rgba(76,76,76,1) 0%, rgba(43,43,43,0.96) 100%);
			background: linear-gradient(to right, rgba(76,76,76,1) 0%, rgba(43,43,43,0.96) 100%);
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4c4c4c', endColorstr='#2b2b2b', GradientType=1 );
			text-decoration-color: red;
		    border-top-left-radius: 0px;
		    border-top-right-radius: 0px;
		    border-bottom-left-radius: 5px;
		    border-bottom-right-radius: 5px;
		}
	</style>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 4000);
    </script>
    <script type="text/javascript">
        function check_text(input) {
            if (input.validity.patternMismatch){
                input.setCustomValidity("La Contraseña debe tener minimo 8 caracteres y al menos: 1 minúscula, 1 mayúscula, 1 número, 1 símbolo");
            }
            else {
                input.setCustomValidity("");
            }
        }
    </script>
</head>
<body>
    <div id="app">
            <nav class="navbar navbar-dark navbar-expand-xl navbar-static-top b-c font-weight-bold">
            <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('img/ceneco-logo.png')}}" alt="image" width="180" height="55"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse font-weight-bold" id="navbarNavDropdown">
                    <ul class="navbar-nav navbar-dark">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                    Iniciar Sesión <i class="fas fa-sign-in-alt"></i></a>
                            </li>
                        @else
                            @role('super-admin')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-tools" aria-hidden="true"></i> Seguridad
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="{{route('backup')}}">Crear Respaldo</a>
                                    <a class="dropdown-item" href="#">Registro de Eventos</a>
                                </div>
                            </li>
                            @endrole
                    </ul>
                    <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user-cog" aria-hidden="true"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu justify-content-end">
                                    @role('super-admin')
                                        <a class="dropdown-item" href="{{route('usuario.index')}}">Consultar Usuario</a>
                                    @endrole
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            Cerrar Sesión
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                    </ul>
                </div>
                @endguest
            </nav>
            <main class="py-4">
                @if(Session::has('message'))
                    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">{{ Session::get('message') }}...</div>
                @endif
                @yield('content')
            </main>
        </div>
</body>
</html>
