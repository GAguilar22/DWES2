@extends('layouts.master')

@section('titulo', 'Detall Compte')

@section('contenido')


    <div class="row g-4 mt-1 mb-5">

        {{-- INFORMACIÓ DEL COMPTE --}}
        <div class="col-lg-4">
            <div class="card shadow-sm h-100" style="border: none; border-radius: 16px; overflow: hidden;">

                <div class="text-white text-center py-4"
                    style="background: linear-gradient(135deg, #0f3460 0%, #16213e 100%);">
                    <div class="rounded-circle bg-white text-dark d-flex align-items-center justify-content-center mx-auto mb-3 fw-bold"
                        style="width: 64px; height: 64px; font-size: 1.5rem;">
                        💳
                    </div>
                    <h5 class="fw-bold mb-0">
                        @if($compte->alias)
                            {{ $compte->alias }}
                        @else
                            {{ $compte->tipus->nom }}
                        @endif
                    </h5>
                    <small style="color: rgba(255,255,255,0.65);">{{ $compte->tipus->nom }}</small>
                </div>

                <div class="card-body px-4 py-3">
                    <ul class="list-unstyled mb-0">
                        <li class="py-2 border-bottom">
                            <div class="text-muted"
                                style="font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.5px;">IBAN</div>
                            <div class="fw-semibold" style="word-break: break-all; font-size: 0.9rem;">{{ $compte->iban }}
                            </div>
                        </li>
                        <li class="py-2 border-bottom">
                            <div class="text-muted"
                                style="font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.5px;">Àlies</div>
                            <div class="fw-semibold">
                                @if($compte->alias)
                                    {{ $compte->alias }}
                                @else
                                    —
                                @endif
                            </div>
                        </li>
                        <li class="py-2 border-bottom">
                            <div class="text-muted"
                                style="font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.5px;">Tipus de
                                compte</div>
                            <div class="fw-semibold">{{ $compte->tipus->nom }}</div>
                        </li>
                        <li class="py-2">
                            <div class="text-muted"
                                style="font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.5px;">Saldo
                                disponible</div>
                            <div class="fw-bold" style="font-size: 1.4rem; color: #0f3460;">
                                {{ number_format($compte->saldo, 2) }} €
                            </div>
                        </li>
                    </ul>

                    <div class="mt-3">
                    <a href="{{ route('bizum.create') }}" class="btn w-100 text-white fw-bold"
                            style="background: linear-gradient(135deg, #0f3460, #5bc0be); border: none; border-radius: 10px;">
                            Fer Bizum
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- MOVIMENTS --}}
        <div class="col-lg-8">
            <div class="card shadow-sm" style="border: none; border-radius: 16px;">
                <div class="card-body px-4 py-3">
                    <h6 class="text-uppercase fw-bold mb-3" style="letter-spacing: 1px; color: #0f3460;">
                        Historial de Moviments
                    </h6>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead style="background-color: #f8f9fa;">
                                <tr>
                                    <th
                                        style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.5px; color: #6c757d; font-weight: 600; border: none;">
                                        Data</th>
                                    <th
                                        style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.5px; color: #6c757d; font-weight: 600; border: none;">
                                        Tipus</th>
                                    <th
                                        style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.5px; color: #6c757d; font-weight: 600; border: none;">
                                        Contrapart</th>
                                    <th class="text-end"
                                        style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.5px; color: #6c757d; font-weight: 600; border: none;">
                                        Import</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($moviments as $bizum)
                                    <tr>
                                        <td style="font-size: 0.85rem; color: #6c757d;">{{ $bizum->dataBizum }}</td>
                                        
                                        @if($bizum->idCompteOrigen == $compte->id)
                                            {{-- Bizum Enviat --}}
                                            <td>
                                                <span class="badge rounded-pill"
                                                    style="background-color: #fde8e8; color: #c0392b; font-size: 0.72rem;">
                                                    Enviat
                                                </span>
                                            </td>
                                            <td style="font-size: 0.88rem;">{{ $bizum->compteDesti->client->user->name }}</td>
                                            <td class="text-end fw-bold" style="font-size: 0.95rem; color: #c0392b;">
                                                -{{ number_format($bizum->quantitat, 2) }} €
                                            </td>
                                        @else
                                            {{-- Bizum Rebut --}}
                                            <td>
                                                <span class="badge rounded-pill"
                                                    style="background-color: #e8f8f5; color: #1a7a5e; font-size: 0.72rem;">
                                                    Rebut
                                                </span>
                                            </td>
                                            <td style="font-size: 0.88rem;">{{ $bizum->compteOrigen->client->user->name }}</td>
                                            <td class="text-end fw-bold" style="font-size: 0.95rem; color: #1a7a5e;">
                                                +{{ number_format($bizum->quantitat, 2) }} €
                                            </td>
                                        @endif
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">
                                            <div class="text-center py-4 text-muted">
                                                <p class="mb-0">Encara no hi ha moviments en aquest compte.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse

                </div>
            </div>
        </div>

    </div>

@endsection