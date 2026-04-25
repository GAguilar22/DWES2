@extends('layouts.master')

@section('titulo', 'CaixaForta - Administració')

@section('contenido')
    <div class="container py-4">

        <h2 class="mb-1 fw-bold">Tauler d'Administració</h2>
        <p class="text-muted mb-4">Gestió global del sistema bancari</p>

        {{-- Missatges d'èxit / error --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>✓</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>✗</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Navegació --}}
        <div class="row g-3 mb-4" id="adminTabs" role="tablist">
            <div class="col-6 col-md-3">
                <button class="btn w-100 p-0 text-start active" id="tab-clients" data-bs-toggle="tab"
                    data-bs-target="#clients" type="button" role="tab" style="border:none; background:none;">
                    <div class="card h-100 border-0 shadow-sm"
                        style="border-radius:14px; background: linear-gradient(135deg,#0f3460,#16213e); color:white; cursor:pointer;">
                        <div class="card-body py-3 px-4">
                            <div class="text-uppercase fw-semibold mb-1"
                                style="font-size:0.65rem; letter-spacing:1px; opacity:0.7;">Total Clients</div>
                            <div class="fw-bold" style="font-size:2rem; line-height:1.1;">{{ $clients->count() }}</div>
                        </div>
                    </div>
                </button>
            </div>
            <div class="col-6 col-md-3">
                <button class="btn w-100 p-0 text-start" id="tab-comptes" data-bs-toggle="tab" data-bs-target="#comptes"
                    type="button" role="tab" style="border:none; background:none;">
                    <div class="card h-100 border-0 shadow-sm"
                        style="border-radius:14px; background: linear-gradient(135deg,#0f3460,#16213e); color:white; cursor:pointer;">
                        <div class="card-body py-3 px-4">
                            <div class="text-uppercase fw-semibold mb-1"
                                style="font-size:0.65rem; letter-spacing:1px; opacity:0.85;">Comptes Actius</div>
                            <div class="fw-bold" style="font-size:2rem; line-height:1.1;">{{ $comptes->count() }}</div>
                        </div>
                    </div>
                </button>
            </div>
            <div class="col-6 col-md-3">
                <button class="btn w-100 p-0 text-start" id="tab-bizums" data-bs-toggle="tab" data-bs-target="#bizums"
                    type="button" role="tab" style="border:none; background:none;">
                    <div class="card h-100 border-0 shadow-sm"
                        style="border-radius:14px; background: linear-gradient(135deg,#0f3460,#16213e); color:white; cursor:pointer;">
                        <div class="card-body py-3 px-4">
                            <div class="text-uppercase fw-semibold mb-1"
                                style="font-size:0.65rem; letter-spacing:1px; opacity:0.85;">Volum Bizums</div>
                            <div class="fw-bold" style="font-size:2rem; line-height:1.1;">{{ $bizums->count() }}</div>
                        </div>
                    </div>
                </button>
            </div>
            <div class="col-6 col-md-3">
                <button class="btn w-100 p-0 text-start" id="tab-tipus" data-bs-toggle="tab" data-bs-target="#tipus"
                    type="button" role="tab" style="border:none; background:none;">
                    <div class="card h-100 border-0 shadow-sm"
                        style="border-radius:14px; background: linear-gradient(135deg,#0f3460,#16213e); color:white; cursor:pointer;">
                        <div class="card-body py-3 px-4">
                            <div class="text-uppercase fw-semibold mb-1"
                                style="font-size:0.65rem; letter-spacing:1px; opacity:0.85;">Tipus de Compte</div>
                            <div class="fw-bold" style="font-size:2rem; line-height:1.1;">{{ $tipus->count() }}</div>
                        </div>
                    </div>
                </button>
            </div>
        </div>

        <div class="tab-content" id="adminTabsContent">

            {{-- SECCIÓ 1: CLIENTS --}}
            <div class="tab-pane fade show active" id="clients" role="tabpanel">
                <div class="card shadow-sm">
                    <div class="card-header text-white fw-bold py-3"
                        style="background: linear-gradient(135deg, #0f3460 0%, #16213e 100%);">                        
                        <h5 class="mb-0 fs-5">Gestió de Clients</h5>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-hover table-striped mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>DNI</th>
                                    <th>Telèfon</th>
                                    <th>Data Naix.</th>
                                    <th class="text-center">Accions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($clients as $client)
                                    <tr>
                                        <td>{{ $client->id }}</td>
                                        <td>{{ $client->user->name }}</td>
                                        <td>{{ $client->user->email }}</td>
                                        <td>{{ $client->dni }}</td>
                                        <td>{{ $client->telefon }}</td>
                                        <td>{{ $client->data_naixement }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.clients.show', $client) }}"
                                                class="btn btn-sm btn-primary">Detall</a>
                                            <a href="{{ route('admin.clients.edit', $client) }}"
                                                class="btn btn-sm btn-warning text-dark">Editar</a>
                                            <form action="{{ route('admin.clients.destroy', $client->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Segur que vols esborrar el client {{ $client->user->name }}?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Esborrar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted py-3">No hi ha clients registrats.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="tab-pane fade" id="tipus" role="tabpanel">
                <div class="card shadow-sm">
                    <div class="card-header text-white fw-bold py-3"
                        style="background: linear-gradient(135deg, #0f3460 0%, #16213e 100%);">                        
                        <h5 class="mb-0 fs-5">Tipus de Comptes</h5>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-hover table-striped mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>Descripció</th>
                                    <th class="text-center">Accions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($tipus as $t)
                                    <tr>
                                        <td>{{ $t->id }}</td>
                                        <td>{{ $t->nom }}</td>
                                        <td>{{ $t->descripcio ?? '-' }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.tipus.edit', $t->id) }}"
                                                class="btn btn-sm btn-warning text-dark">Editar</a>
                                            <form action="{{ route('admin.tipus.destroy', $t->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Segur que vols esborrar el tipus {{ $t->nom }}?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Esborrar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted py-3">No hi ha tipus definits.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

            {{-- SECCIÓ 3: COMPTES BANCARIS --}}
            <div class="tab-pane fade" id="comptes" role="tabpanel">
                <div class="card shadow-sm">
                    <div class="card-header text-white fw-bold py-3"
                        style="background: linear-gradient(135deg, #0f3460 0%, #16213e 100%);">                        
                        <h5 class="mb-0 fs-5">Comptes Bancaris</h5>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-hover table-striped mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Titular</th>
                                    <th>IBAN</th>
                                    <th>Àlies</th>
                                    <th>Tipus</th>
                                    <th>Saldo</th>
                                    <th class="text-center">Accions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($comptes as $compte)
                                    <tr>
                                        <td>{{ $compte->id }}</td>
                                        <td>{{ $compte->client->user->name }}</td>
                                        <td><small>{{ $compte->iban }}</small></td>
                                        <td>{{ $compte->alias }}</td>
                                        <td>{{ $compte->tipus->nom }}</td>
                                        <td>{{ number_format($compte->saldo, 2) }} €</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.comptes.show', $compte->id) }}"
                                                class="btn btn-sm btn-primary">Detall</a>
                                            <a href="{{ route('admin.comptes.edit', $compte->id) }}"
                                                class="btn btn-sm btn-warning text-dark">Editar</a>
                                            <form action="{{ route('admin.comptes.destroy', $compte->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Segur que vols esborrar el compte {{ $compte->iban }}?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Esborrar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted py-3">No hi ha comptes registrats.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

            {{-- SECCIÓ 4: BIZUMS --}}
            <div class="tab-pane fade" id="bizums" role="tabpanel">
                <div class="card shadow-sm">
                    <div class="card-header text-white fw-bold py-3"
                        style="background: linear-gradient(135deg, #0f3460 0%, #16213e 100%);">                        
                        <h5 class="mb-0 fs-5">Bizums entre Clients</h5>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-hover table-striped mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Data</th>
                                    <th>Origen</th>
                                    <th>Destí</th>
                                    <th>Import</th>
                                    <th class="text-center">Accions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($bizums as $bizum)
                                    <tr>
                                        <td>{{ $bizum->id }}</td>
                                        <td>{{ $bizum->dataBizum->format('d/m/Y H:i') }}</td>
                                        <td>{{ $bizum->compteOrigen->client->user->name }}</td>
                                        <td>{{ $bizum->compteDesti->client->user->name }}</td>
                                        <td class="text-danger fw-bold">{{ number_format($bizum->quantitat, 2) }} €</td>
                                        <td class="text-center">
                                            <form action="{{ route('admin.bizums.destroy', $bizum->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Segur que vols esborrar aquest bizum?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger fw-bold">Esborrar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-3">No s'han realitzat bizums encara.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>{{-- fi tab-content --}}
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // El servidor ens diu quin tab ha d'estar actiu
            const activeTabId = '{{ $activeTab }}';

            function updateCardStyles(activeId) {
                document.querySelectorAll('#adminTabs button').forEach(btn => {
                    const tabId = btn.getAttribute('data-bs-target').replace('#', '');
                    const card = btn.querySelector('.card');
                    if (tabId === activeId) {
                        card.style.opacity = '1';
                        card.style.boxShadow = '0 6px 20px rgba(0,0,0,0.25)';
                        card.style.transform = 'translateY(-2px)';
                    } else {
                        card.style.opacity = '0.65';
                        card.style.boxShadow = '';
                        card.style.transform = '';
                    }
                });
            }

            // Activem el tab correcte en carregar la pàgina
            const activeBtn = document.querySelector(`#adminTabs button[data-bs-target="#${activeTabId}"]`);
            if (activeBtn) {
                bootstrap.Tab.getOrCreateInstance(activeBtn).show();
                updateCardStyles(activeTabId);
            }

            // Quan cliquem un tab, actualitzem la URL i l'estil
            document.querySelectorAll('#adminTabs button').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    const tabId = this.getAttribute('data-bs-target').replace('#', '');
                    const url = new URL(window.location.href);
                    url.searchParams.set('tab', tabId);
                    window.history.replaceState({}, '', url);
                    updateCardStyles(tabId);
                });
            });
        });
    </script>
@endsection