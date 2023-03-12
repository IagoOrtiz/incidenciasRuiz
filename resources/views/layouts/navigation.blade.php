<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" style="height: 3rem">
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="d-flex justify-content-left navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link @if (request()->routeIs('dashboard')) active @endif"
                        href="{{ route('dashboard') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (request()->routeIs('incidencias.create')) active @endif"
                        href="{{ route('incidencias.create') }}">Crear incidencia</a>
                </li>
                @if (auth()->user()->admin)
                    <li class="nav-item">
                        <a class="nav-link @if (request()->routeIs('users')) active @endif"
                            href="{{ route('users') }}">Panel de administrador</a>
                    </li>
                @endif

                <li class="nav-item dropdown ml-auto">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('profile.edit')}}">Perfil</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="dropdown-item">
                                @csrf
                                <x-dropdown-link href="{{route('logout')}}"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    Cerrar sesión
                                </x-dropdown-link>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
