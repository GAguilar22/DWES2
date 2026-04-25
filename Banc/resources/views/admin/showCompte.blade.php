@extends('layouts.master')

@section('titulo', 'CaixaForta - Detall Compte')

@section('contenido')
    <div class="container py-4">

        <div class="mb-4">
            <h3 class="mb-0 fw-bold">Detall Compte Bancari</h3>
        </div>

        <div class="row g-4">

            {{-- COLUMNA ESQUERRA: DADES DEL COMPTE --}}
            <div class="col-lg-4">
                <div class="card shadow-sm" style="border: none; border-radius: 16px; overflow: hidden;">

                    <div class="text-white text-center py-4"
                        style="background: linear-gradient(135deg, #0f3460 0%, #16213e 100%);">
                        <div class="rounded-circle bg-white text-dark d-flex align-items-center justify-content-center mx-auto mb-3"
                            style="width: 72px; height: 72px; font-size: 1.5rem; font-weight: bold;">
                            💳
                        </div>
                        <h5 class="fw-bold mb-0">{{ $compte->alias ?? $compte->tipus->nom }}</h5>
                        <small style="color: rgba(255,255,255,0.65);">{{ $compte->tipus->nom }}</small>
                    </div>

                    <div class="card-body px-4 py-3">
                        <ul class="list-unstyled mb-0">
                            <li class="py-2 border-bottom">
                                <div class="text-muted"
                                    style="font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.5px;">IBAN</div>
                                <div class="fw-semibold font-monospace" style="font-size: 0.8rem; word-break: break-all;">
                                    {{ $compte->iban }}</div>
                            </li>
                            <li class="py-2 border-bottom">
                                <div class="text-muted"
                                    style="font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.5px;">Propietari
                                </div>
                                <div class="fw-semibold">{{ $compte->client->user->name }}</div>
                                <div class="text-muted" style="font-size: 0.8rem;">{{ $compte->client->user->email }}</div>
                            </li>
                            <li class="py-2 border-bottom">
                                <div class="text-muted"
                                    style="font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.5px;">Tipus
                                </div>
                                <div class="fw-semibold">{{ $compte->tipus->nom }}</div>
                            </li>
                            <li class="py-2">
                                <div class="text-muted"
                                    style="font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.5px;">Saldo
                                </div>
                                <div class="fw-bold fs-5" style="color: #0f3460;">{{ number_format($compte->saldo, 2) }} €
                                </div>
                            </li>
                        </ul>

                        <div class="mt-3">
                            <a href="{{ route('admin.comptes.edit', $compte->id) }}" class="btn w-100 text-white fw-bold"
                                style="background: linear-gradient(135deg, #0f3460, #5bc0be); border: none; border-radius: 10px;">
                                Editar Compte
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- COLUMNA DRETA: HISTORIAL DE BIZUMS --}}
            <div class="col-lg-8">
                <div class="card shadow-sm" style="border: none; border-radius: 16px;">
                    <div class="card-body px-4 py-3">
                        <h6 class="text-uppercase fw-bold mb-3" style="letter-spacing: 1px; color: #0f3460;">
                            Historial de Bizums
                        </h6>

                        @forelse($bizums as $bizum)
                            <div class="d-flex align-items-center justify-content-between border rounded-3 px-3 py-2 mb-2">
                                <div class="d-flex align-items-center gap-2">
                                    @if($bizum->idCompteOrigen === $compte->id)
                                        <span class="badge rounded-pill"
                                            style="background-color: #fde8e8; color: #c0392b; font-size: 0.7rem;">Enviat</span>
                                        <span style="font-size: 0.85rem;">→ {{ $bizum->compteDesti->client->user->name }}</span>
                                    @else
                                        <span class="badge rounded-pill"
                                            style="background-color: #e8f8f5; color: #1a7a5e; font-size: 0.7rem;">Rebut</span>
                                        <span style="font-size: 0.85rem;">← {{ $bizum->compteOrigen->client->user->name }}</span>
                                    @endif
                                    <span class="text-muted"
                                        style="font-size: 0.75rem;">{{ $bizum->dataBizum->format('d/m/Y H:i') }}</span>
                                </div>
                                @if($bizum->idCompteOrigen === $compte->id)
                                    <span class="fw-bold" style="color: #c0392b;">-{{ number_format($bizum->quantitat, 2) }}
                                        €</span>
                                @else
                                    <span class="fw-bold" style="color: #1a7a5e;">+{{ number_format($bizum->quantitat, 2) }}
                                        €</span>
                                @endif
                            </div>
                        @empty
                            <p class="text-muted text-center py-3" style="font-size: 0.85rem;">Cap moviment registrat per a
                                aquest compte.</p>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection