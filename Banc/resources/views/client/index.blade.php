@extends('layouts.master')

@section('titulo', 'BANC IBC')

@section('contenido')

    {{-- ===================== COMPTES BANCÀRIES ===================== --}}
    <div class="card shadow-sm mb-4 mt-4">
        <div class="card-body">
            <h5 class="text-center text-uppercase fw-bold mb-4">Comptes bancàries</h5>
            <div class="row align-items-center">

                {{-- Cards de comptes --}}
                @forelse ($client->comptes as $compte)
                    <div class="col-6 col-md-3 text-center mb-3">
                        <div class="border rounded p-3 d-flex flex-column align-items-center">
                            {{-- Placeholder imatge --}}
                            <svg width="100" height="80" viewBox="0 0 100 80" class="mb-2" style="border:1px solid #ccc;">
                                <line x1="0" y1="0" x2="100" y2="80" stroke="#ccc" />
                                <line x1="100" y1="0" x2="0" y2="80" stroke="#ccc" />
                                <rect width="100" height="80" fill="none" stroke="#ccc" />
                            </svg>
                            <p class="fw-bold text-uppercase mb-1" style="font-size: 0.8rem;">{{ $compte->tipus->nom }}</p>
                            <p class="text-muted mb-1" style="font-size: 0.75rem;">{{ $compte->iban }}</p>
                            <p class="fw-bold mb-0">{{ number_format($compte->saldo, 2) }} €</p>
                        </div>
                    </div>
                @empty
                    <div class="col text-center text-muted">No tens cap compte bancari.</div>
                @endforelse

                {{-- Botó crear compte nova --}}
                <div class="col-6 col-md-3 text-center mb-3">
                    <a href="#" class="text-decoration-none text-dark d-flex flex-column align-items-center">
                        <div class="border border-2 rounded-circle d-flex align-items-center justify-content-center mb-2"
                            style="width: 80px; height: 80px; font-size: 2rem; line-height: 1;">
                            +
                        </div>
                        <p class="fw-bold text-uppercase mb-0" style="font-size: 0.8rem;">Crear<br>compte nova</p>
                    </a>
                </div>

            </div>
        </div>
    </div>

    {{-- ===================== ÚLTIMS MOVIMENTS ===================== --}}
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h5 class="text-center text-uppercase fw-bold mb-4">Últims moviments</h5>
            <div class="row">
                <div class="col-md-10">

                    Llista de moviments
                    @php $moviments = [1, 2, 3, 4]; @endphp
                    @foreach ($moviments as $mov)
                        <div class="d-flex align-items-center justify-content-between border rounded px-3 py-2 mb-2">
                            <span class="text-muted" style="font-size: 0.85rem;"> moviment {{ $mov }}</span>
                            <a href="#" class="btn btn-sm text-white" style="background-color: #5bc0be; font-size: 0.75rem;">
                                Veure detall
                            </a>
                        </div>
                    @endforeach

                    {{-- Paginació --}}
                    <div class="d-flex justify-content-center mt-3 gap-1">
                        @foreach([1, 2, 3, 4, 5, 6, 7, 8] as $page)
                            <a href="#" class="btn btn-sm {{ $page === 1 ? 'text-white' : 'btn-outline-secondary' }}"
                                style="{{ $page === 1 ? 'background-color: #5bc0be;' : '' }} font-size: 0.75rem; min-width: 30px;">
                                {{ $page }}
                            </a>
                        @endforeach
                    </div>

                </div>

                {{-- Botó FER BIZUM --}}
                <div class="col-md-2 d-flex flex-column align-items-center justify-content-center">
                    <a href="#" class="text-decoration-none text-dark text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" class="mb-1">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M13 5l7 7-7 7M5 12h15" />
                        </svg>
                        <p class="fw-bold text-uppercase mb-0" style="font-size: 0.8rem;">Fer Bizum</p>
                    </a>
                </div>

            </div>
        </div>
    </div>

@endsection