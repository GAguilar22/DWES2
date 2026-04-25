<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
    <div class="container-fluid px-4">
        <a class="navbar-brand text-decoration-none d-flex align-items-center gap-2" href="{{ route('client.index') }}">
            <div class="rounded-circle d-flex align-items-center justify-content-center"
                style="width: 38px; height: 38px; background: linear-gradient(135deg, #0f3460, #16213e); font-size: 1.1rem;">
                🔐
            </div>
            <span class="fw-bold" style="color: #0f3460; letter-spacing: 1px; font-size: 1.2rem;">CaixaForta</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto gap-2">
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('client.index') ? 'fw-bold' : '' }}"
                        href="{{ route('client.index') }}">Inici</a>
                </li>
                @auth
                @if(Auth::user()->email !== 'admin@admin.cat')
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('bizum.create') ? 'fw-bold' : '' }}"
                        href="{{ route('bizum.create') }}">Fer Bizum</a>
                </li>
                @endif
                @endauth
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