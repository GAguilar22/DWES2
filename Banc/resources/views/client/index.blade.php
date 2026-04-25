@extends('layouts.master')

@section('titulo', 'CaixaForta - Dashboard')

@section('contenido')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        <strong>✓</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="row mt-4 g-4">

    {{-- COLUMNA ESQUERRA: DADES PERSONALS --}}
    <div class="col-lg-4">
        <div class="card shadow-sm" style="border: none; border-radius: 16px; overflow: hidden;">

            <div class="text-white text-center py-4"
                style="background: linear-gradient(135deg, #0f3460 0%, #16213e 100%);">
                <div class="rounded-circle bg-white text-dark d-flex align-items-center justify-content-center mx-auto mb-3"
                    style="width: 72px; height: 72px; font-size: 1.8rem; font-weight: bold;">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <h5 class="fw-bold mb-0">{{ Auth::user()->name }}</h5>
                <small style="color: rgba(255,255,255,0.65);">Client CaixaForta</small>
            </div>

            <div class="card-body px-4 py-3">
                <ul class="list-unstyled mb-0">
                    <li class="d-flex align-items-center py-2 border-bottom">
                        <div>
                            <div class="text-muted" style="font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.5px;">DNI</div>
                            <div class="fw-semibold">{{ $client->dni }}</div>
                        </div>
                    </li>
                    <li class="d-flex align-items-center py-2 border-bottom">
                        <div>
                            <div class="text-muted" style="font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.5px;">Telèfon</div>
                            <div class="fw-semibold">{{ $client->telefon }}</div>
                        </div>
                    </li>
                    <li class="d-flex align-items-center py-2 border-bottom">
                        <div>
                            <div class="text-muted" style="font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.5px;">Data de Naixement</div>
                            <div class="fw-semibold">{{ $client->data_naixement }}</div>
                        </div>
                    </li>
                    <li class="d-flex align-items-center py-2">
                        <div>
                            <div class="text-muted" style="font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.5px;">Correu electrònic</div>
                            <div class="fw-semibold" style="word-break: break-all;">{{ Auth::user()->email }}</div>
                        </div>
                    </li>
                </ul>
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
                <div class="row justify-content-center gap-4 align-items-stretch">
                    @forelse ($client->comptes as $compte)
                        <div class="col-10 col-sm-6 col-md-5 col-lg-4">
                            <a href="{{ route('compte.show', $compte) }}" class="text-decoration-none">
                                <div class="border rounded-3 p-3 text-center h-100 d-flex flex-column align-items-center justify-content-center"
                                    style="transition: box-shadow 0.2s; cursor: pointer;"
                                    onmouseover="this.style.boxShadow='0 4px 16px rgba(15,52,96,0.15)'"
                                    onmouseout="this.style.boxShadow='none'">
                                    <div class="rounded-circle mb-2 d-flex align-items-center justify-content-center text-white"
                                        style="width: 48px; height: 48px; background: linear-gradient(135deg, #0f3460, #5bc0be); font-size: 1.3rem;">
                                        💳
                                    </div>
                                    <p class="fw-bold text-uppercase mb-1 text-dark" style="font-size: 0.75rem;">
                                        @if($compte->alias)
                                            {{ $compte->alias }}
                                        @else
                                            {{ $compte->tipus->nom }}
                                        @endif
                                    </p>
                                    <p class="text-muted mb-1" style="font-size: 0.68rem; word-break: break-all;">
                                        {{ wordwrap($compte->iban, 8, ' ', true) }}
                                    </p>
                                    <p class="fw-bold mb-0" style="color: #0f3460; font-size: 1rem;">
                                        {{ number_format($compte->saldo, 2) }} €
                                    </p>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col text-center text-muted py-3">No tens cap compte bancari.</div>
                    @endforelse


                </div>
            </div>
        </div>

        {{-- ÚLTIMS MOVIMENTS --}}
        <div class="card shadow-sm" style="border: none; border-radius: 16px;">
            <div class="card-body px-4 py-3">
                <h6 class="text-uppercase fw-bold mb-3" style="letter-spacing: 1px; color: #0f3460;">
                    Últims Moviments
                </h6>
                <div class="row">
                    <div class="col-md-10">
                        @forelse ($moviments as $mov)
                            <div class="d-flex align-items-center justify-content-between border rounded-3 px-3 py-2 mb-2">
                                <div class="d-flex align-items-center gap-2">
                                    @if(in_array($mov->idCompteOrigen, $compteIds))
                                        <span class="badge rounded-pill" style="background-color: #fde8e8; color: #c0392b; font-size: 0.7rem;">Enviat</span>
                                        <span style="font-size: 0.85rem;">{{ $mov->compteDesti->client->user->name }}</span>
                                    @else
                                        <span class="badge rounded-pill" style="background-color: #e8f8f5; color: #1a7a5e; font-size: 0.7rem;">Rebut</span>
                                        <span style="font-size: 0.85rem;">{{ $mov->compteOrigen->client->user->name }}</span>
                                    @endif
                                    <span class="text-muted" style="font-size: 0.75rem;">{{ $mov->dataBizum }}</span>
                                </div>
                                @if(in_array($mov->idCompteOrigen, $compteIds))
                                    <span class="fw-bold" style="font-size: 0.9rem; color: #c0392b;">
                                        -{{ number_format($mov->quantitat, 2) }} €
                                    </span>
                                @else
                                    <span class="fw-bold" style="font-size: 0.9rem; color: #1a7a5e;">
                                        +{{ number_format($mov->quantitat, 2) }} €
                                    </span>
                                @endif
                            </div>
                        @empty
                            <p class="text-muted text-center py-3" style="font-size: 0.85rem;">Encara no hi ha moviments.</p>
                        @endforelse

                        {{-- Paginació Bootstrap --}}
                        <div class="mt-2">
                            {{ $moviments->links() }}
                        </div>
                    </div>

                    {{-- Botó FER BIZUM --}}
                    <div class="col-md-2 d-flex flex-column align-items-center justify-content-center">
                        <a href="{{ route('bizum.create') }}" class="text-decoration-none text-dark text-center">
                            <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-1 text-white"
                                style="width: 56px; height: 56px; background: linear-gradient(135deg, #0f3460, #5bc0be);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 5l7 7-7 7M5 12h15" />
                                </svg>
                            </div>
                            <p class="fw-bold text-uppercase mb-0" style="font-size: 0.72rem; letter-spacing: 0.5px;">Fer Bizum</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



@endsection