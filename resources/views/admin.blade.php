<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Sistema Neurofisiologia Clinica Occidental">
    <meta name="keyword" content="Sistema Ceneco S.A">
    <title>Ceneco S.A</title>
    <link rel="shortcut icon" href="{{asset('img/cenecoicon.png')}}">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/all.css')}}" rel="stylesheet" />
    <link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/buttons.dataTables.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/select.dataTables.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/w3.css')}}" rel="stylesheet" />
    <link href="{{asset('css/coreui.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    @yield('styles')
    <style type="text/css">
      .app-header .navbar-toggler {
        min-width: 25px;
        margin-left: 25px;
        padding: .25rem 0;
      }
      .imgs{
        margin-left: 13px;
        margin-top: -10px;
      }
      .navbar-nav .nav-link {
        margin-top: 30px;
      }
      .error{
        color: red;
      }
      .with-mt{
        margin-top: -15px;
      }
    </style>
    <script>
      window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove();
          });
      }, 5000);
    </script>
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed pace-done sidebar-lg-show">
    <header class="app-header navbar">
        <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto"  type="button" data-toggle="sidebar-show">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">
            <span class="navbar-brand-full"><img src="{{asset('img/ceneco-logo.png')}}" class="imgs" alt="image" width="180" height="55"></span>
            <span class="navbar-brand-minimized"><img src="{{asset('img/cenecoicon.png')}}"  alt="image" width="45" height="45"></span>
        </a>
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
            <span class="navbar-toggler-icon"></span>
        </button>

        <ul class="nav navbar-nav ml-auto">
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
              <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-cog" aria-hidden="true"></i>
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                  <div class="dropdown-header text-center">
                      <strong>Cuenta</strong>
                  </div>
                  @role('usuario|admin')
                <a class="dropdown-item" href="{{route('usuario.edit', Auth::user()->id)}}"><i class="fa fa-user"></i> Perfil</a>
                  @endrole
                  @role('super-admin')
                    <a class="dropdown-item" href="{{route('usuario.index')}}"><i class="fas fa-users"></i> Consultar Usuarios</a>
                  @endrole
                   <a class="dropdown-item" data-toggle="modal" data-target="#modal_creditos" title="Acerca de Ceneco"><i class="fas fa-info"></i> Acerca de Ceneco</a>
                  <form method="post" action="{{ route('logout') }}">
                      {{ csrf_field() }}
                      <button class="btn btn-primary btn-block"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</button>
                  </form>
              </div>
          </li>
        </ul>
    </header>
    <div class="app-body">
        @include('menu')
        @include('modal/modal-help')
        @include('modal/modal-help-sub-estudio')
        @include('modal/modal-creditos')
        @include('modal/modal-autologout')
        <main class="main">
            <div style="padding-top: 20px" class="container-fluid">
                @yield('content')
            </div>
        </main>
        <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
         <div id="message-alert-logout" class="modal">
</div>
    </div>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/coreui.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/jszip.min.js') }}"></script>
    <script src="{{ asset('js/ckeditor.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('js/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/dropzone.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('js/block-bt.js') }}"></script>
    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/utils.js') }}"></script>
    <script>
        $(function() {
  let copyButtonTrans = '{{ trans('global.datatables.copy') }}'
  let csvButtonTrans = '{{ trans('global.datatables.csv') }}'
  let excelButtonTrans = '{{ trans('global.datatables.excel') }}'
  let pdfButtonTrans = '{{ trans('global.datatables.pdf') }}'
  let printButtonTrans = '{{ trans('global.datatables.print') }}'
  let colvisButtonTrans = '{{ trans('global.datatables.colvis') }}'

  let languages = {
    'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
  };

  $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, { className: 'btn' })
  $.extend(true, $.fn.dataTable.defaults, {
    language: {
      url: languages.{{ app()->getLocale() }}
    },
    columnDefs: [{
        orderable: false,
        className: 'select-checkbox',
        targets: 0
    }, {
        orderable: false,
        searchable: false,
        targets: -1
    }],
    select: {
      style:    'multi+shift',
      selector: 'td:first-child'
    },
    order: [],
    scrollX: true,
    pageLength: 100,
    dom: 'lBfrtip<"actions">',
    buttons: [
      {
        extend: 'copy',
        className: 'btn-default',
        text: copyButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'csv',
        className: 'btn-default',
        text: csvButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'excel',
        className: 'btn-default',
        text: excelButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'pdf',
        className: 'btn-default',
        text: pdfButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'print',
        className: 'btn-default',
        text: printButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'colvis',
        className: 'btn-default',
        text: colvisButtonTrans,
        exportOptions: {
          columns: ':visible'
        }
      }
    ]
  });

  $.fn.dataTable.ext.classes.sPageButton = '';
});

    </script>
    @yield('scripts')
	<script type="text/javascript">
		(function ($) {
		    var timeout;
		    $(document).on('mousemove', function (event) {
		        if (timeout !== undefined) {
		            window.clearTimeout(timeout);
		        }
		        timeout = window.setTimeout(function () {
		            $(event.target).trigger('mousemoveend');
		        }, 900000);
		    });
		}(jQuery));

		$(document).on('mousemoveend', function () {
		    $('#message-alert-autologout').modal();
          timeLogout = setTimeout(function () {
            window.location = '{{route('logout')}}';
          }, 3000);
		});
	</script>
</body>

</html>