@extends('layouts.master')

@section('titulo', 'CaixaForta - Detall Client')

@section('contenido')
    <div class="container py-4">

        <div class="d-flex align-items-center gap-2 mb-4">
            <h3 class="mb-0 fw-bold">Detall Client</h3>
        </div>

        <div class="row g-4">

            {{-- COLUMNA ESQUERRA: DADES PERSONALS --}}
            <div class="col-lg-4">
                <div class="card shadow-sm" style="border: none; border-radius: 16px; overflow: hidden;">

                    <div class="text-white text-center py-4"
                        style="background: linear-gradient(135deg, #0f3460 0%, #16213e 100%);">
                        <div class="rounded-circle bg-white text-dark d-flex align-items-center justify-content-center mx-auto mb-3"
                            style="width: 72px; height: 72px; font-size: 1.8rem; font-weight: bold;">
                            {{ strtoupper(substr($client->user->name, 0, 1)) }}
                        </div>
                        <h5 class="fw-bold mb-0">{{ $client->user->name }}</h5>
                        <small style="color: rgba(255,255,255,0.65);">Client CaixaForta</small>
                    </div>

                    <div class="card-body px-4 py-3">
                        <ul class="list-unstyled mb-0">
                            <li class="py-2 border-bottom">
                                <div class="text-muted"
                                    style="font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.5px;">Email
                                </div>
                                <div class="fw-semibold">{{ $client->user->email }}</div>
                            </li>
                            <li class="py-2 border-bottom">
                                <div class="text-muted"
                                    style="font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.5px;">DNI</div>
                                <div class="fw-semibold">{{ $client->dni }}</div>
                            </li>
                            <li class="py-2 border-bottom">
                                <div class="text-muted"
                                    style="font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.5px;">Telèfon
                                </div>
                                <div class="fw-semibold">{{ $client->telefon }}</div>
                            </li>
                            <li class="py-2">
                                <div class="text-muted"
                                    style="font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.5px;">Data de
                                    Naixement</div>
                                <div class="fw-semibold">{{ $client->data_naixement }}</div>
                            </li>
                        </ul>

                        <div class="mt-3">
                            <a href="{{ route('admin.clients.edit', $client) }}" class="btn w-100 text-white fw-bold"
                                style="background: linear-gradient(135deg, #0f3460, #5bc0be); border: none; border-radius: 10px;">
                                Editar Client
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- COLUMNA DRETA --}}
            <div class="col-lg-8 d-flex flex-column gap-4">

                {{-- COMPTES BANCARIS --}}
                <div class="card shadow-sm" style="border: none; border-radius: 16px;">
                    <div class="card-body px-4 py-3">
                        <h6 class="text-uppercase fw-bold mb-3" style="letter-spacing: 1px; color: #0f3460;">
                            Comptes Bancaris
                        </h6>
                        <table class="table table-hover table-striped mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>IBAN</th>
                                    <th>Àlies</th>
                                    <th>Tipus</th>
                                    <th class="text-end">Saldo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($client->comptes as $compte)
                                    <tr>
                                        <td><small>{{ $compte->iban }}</small></td>
                                        <td>{{ $compte->alias ?? '—' }}</td>
                                        <td>{{ $compte->tipus->nom }}</td>
                                        <td class="text-end fw-bold">{{ number_format($compte->saldo, 2) }} €</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted py-3">Cap compte registrat.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- HISTORIAL DE BIZUMS --}}
                <div class="card shadow-sm" style="border: none; border-radius: 16px;">
                    <div class="card-body px-4 py-3">
                        <h6 class="text-uppercase fw-bold mb-3" style="letter-spacing: 1px; color: #0f3460;">
                            Historial de Bizums
                        </h6>
                        @forelse($bizums as $bizum)
                            <div class="d-flex align-items-center justify-content-between border rounded-3 px-3 py-2 mb-2">
                                <div class="d-flex align-items-center gap-2">
                                    @if(in_array($bizum->idCompteOrigen, $compteIds))
                                        <span class="badge rounded-pill"
                                            style="background-color: #fde8e8; color: #c0392b; font-size: 0.7rem;">Enviat</span>
                                        <span style="font-size: 0.85rem;"> {{ $bizum->compteDesti->client->user->name }}</span>
                                    @else
                                        <span class="badge rounded-pill"
                                            style="background-color: #e8f8f5; color: #1a7a5e; font-size: 0.7rem;">Rebut</span>
                                        <span style="font-size: 0.85rem;"> {{ $bizum->compteOrigen->client->user->name }}</span>
                                    @endif
                                    <span class="text-muted"
                                        style="font-size: 0.75rem;">{{ $bizum->dataBizum->format('d/m/Y H:i') }}</span>
                                </div>
                                @if(in_array($bizum->idCompteOrigen, $compteIds))
                                    <span class="fw-bold" style="font-size: 0.9rem; color: #c0392b;">
                                        -{{ number_format($bizum->quantitat, 2) }} €
                                    </span>
                                @else
                                    <span class="fw-bold" style="font-size: 0.9rem; color: #1a7a5e;">
                                        +{{ number_format($bizum->quantitat, 2) }} €
                                    </span>
                                @endif
                            </div>
                        @empty
                            <p class="text-muted text-center py-3" style="font-size: 0.85rem;">Cap moviment registrat.</p>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection