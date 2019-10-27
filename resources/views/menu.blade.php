<div class="sidebar">
    <nav class="sidebar-nav ps ps--active-y">

        <ul class="nav">
            <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    Menú
                </a>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle">
                <i class="fas fa-clipboard-list nav-icon" aria-hidden="true"></i>
                    Gestionar Citas
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{ route("paciente.create") }}" class="nav-link {{ request()->is('citas/addpaciente') || request()->is('citas/addpaciente/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-plus"></i>
                            Registrar Paciente
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('sol_pac')}}" class="nav-link {{ request()->is('citas.solpaciente') || request()->is('citas.solpaciente/*') || request()->is('citas.selreferencia') || request()->is('citas.selreferencia/*')  ? 'active' : '' }}">
                            <i class="nav-icon fas fa-clipboard-check"></i>
                            Registrar Cita
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("edit_pac") }}" class="nav-link {{ request()->is('citas/editpaciente') || request()->is('citas/editpaciente/*') ? 'active' : '' }}">
                            <i class="nav-icon far fa-edit"></i>
                            Actualizar Paciente
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle">
                <i class="fas fa-clipboard nav-icon" aria-hidden="true"></i>
                    Controlar Citas
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{ route("controlcita.index") }}" class="nav-link {{ request()->is('controlcitas/verificar_citas') || request()->is('controlcitas/verificar_citas/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-calendar"></i>
                            Listar Citas Actual
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("index_fecha") }}" class="nav-link {{ request()->is('controlcitas/verificar_citas_fecha') || request()->is('controlcitas/verificar_citas_fecha/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            Listar Citas por Fecha
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a href="{{ route("sol_hist") }}" class="nav-link {{ request()->is('consultas/sol_hist') || request()->is('consultas/sol_hist/*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-history"></i>
                        Consultar Historial
                </a>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle">
                <i class="fas fa-ellipsis-h nav-icon" aria-hidden="true"></i>
                    Configurar
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{ route("referencias.index") }}" class="nav-link {{ request()->is('areas/referencia/referencia') || request()->is('areas/referencia/referencia/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-plus"></i>
                            Registrar Referencias
                        </a>
                    </li>
                    @role('super-admin|admin')
                    <li class="nav-item">
                        <a href="{{ route("consultorio.index") }}" class="nav-link {{ request()->is('areas/consultorio/consultorio') || request()->is('areas/consultorio/consultorio/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-clinic-medical"></i>
                            Registrar Consultorios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("estudio.index") }}" class="nav-link {{ request()->is('citas/estudio/estudio') || request()->is('citas/estudio/estudio/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-stethoscope"></i>
                            Registrar Estudios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("subestudios.index") }}" class="nav-link {{ request()->is('seguridad/complemento') || request()->is('seguridad/complemento/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-edit"></i>
                            Actualizar Precios
                        </a>
                    </li>
                    @endrole
                </ul>
            </li>
            @role('super-admin')
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle">
                <i class="fas fa-tools nav-icon" aria-hidden="true"></i>
                    Gestionar Seguridad
                </a>
                <ul class="nav-dropdown-items">

                    <li class="nav-item">
                        <a href="{{ route("backup") }}" class="nav-link">
                            <i class="nav-icon fas fa-database"></i>
                            Generar Respaldo
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("restore") }}" class="nav-link">
                            <i class="nav-icon fas fa-database"></i>
                            Restaurar Respaldo
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("bitacora.index") }}" class="nav-link {{ request()->is('seguridad/bitacora/bitacora') || request()->is('seguridad/bitacora/bitacora/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-shield-alt"></i>
                            Consultar Bitácora
                        </a>
                    </li>
                </ul>
            </li>
            @endrole
        </ul>

        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; height: 869px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 415px;"></div>
        </div>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>