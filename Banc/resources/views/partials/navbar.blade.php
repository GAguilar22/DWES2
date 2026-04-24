<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
    <div class="container-fluid px-4">
        <a class="navbar-brand fw-bold fs-4 border border-2 border-dark px-3 py-1" href="{{ route('client.index') }}"
            style="color: black; letter-spacing: 1px;">
            BANC Gerard
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto gap-2">
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('client.index') ? 'fw-bold' : '' }}"
                        href="{{ route('client.index') }}">Dades personals</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('compte.show') ? 'fw-bold' : '' }}"
                        href="{{ route('client.index') }}">Comptes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Crear compte</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Moviments</a>
                </li>
                @auth
                    <li class="nav-item dropdown ms-2">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">Perfil</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Tancar sessió
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>