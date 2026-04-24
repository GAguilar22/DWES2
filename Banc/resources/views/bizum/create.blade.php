@extends('layouts.master')

@section('titulo', 'Fer Bizum')

@section('contenido')


    <div class="row justify-content-center mt-3 mb-5">
        <div class="col-md-6">
            <div class="card shadow-sm" style="border: none; border-radius: 16px; overflow: hidden;">

                <div class="text-white text-center py-4"
                    style="background: linear-gradient(135deg, #0f3460 0%, #16213e 100%);">
                    <h5 class="fw-bold mb-0">Fer Bizum</h5>
                    <small style="color: rgba(255,255,255,0.65);">Transfereix diners a un altre client</small>
                </div>

                <div class="card-body p-4">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <form method="POST" action="{{ route('bizum.store') }}">
                        @csrf

                        {{-- Compte origen --}}
                        <div class="mb-3">
                            <label for="idCompteOrigen" class="form-label fw-semibold">Compte d'origen</label>
                            <select id="idCompteOrigen" name="idCompteOrigen"
                                class="form-select @error('idCompteOrigen') is-invalid @enderror" required>
                                <option value="">Selecciona un compte...</option>
                                @foreach ($client->comptes as $compte)
                                    <option value="{{ $compte->id }}" {{ old('idCompteOrigen') == $compte->id ? 'selected' : '' }}>
                                        @if($compte->alias)
                                            {{ $compte->alias }}
                                        @else
                                            {{ $compte->tipus->nom }}
                                        @endif
                                        — {{ number_format($compte->saldo, 2) }} €
                                    </option>
                                @endforeach
                            </select>
                            @error('idCompteOrigen')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Telèfon destí --}}
                        <div class="mb-3">
                            <label for="telefon_desti" class="form-label fw-semibold">Telèfon del destinatari</label>
                            <input id="telefon_desti" type="text"
                                class="form-control @error('telefon_desti') is-invalid @enderror" name="telefon_desti"
                                value="{{ old('telefon_desti') }}" placeholder="600000000" required>
                            @error('telefon_desti')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Import --}}
                        <div class="mb-4">
                            <label for="quantitat" class="form-label fw-semibold">Import (€)</label>
                            <input id="quantitat" type="number" step="0.01" min="0.01"
                                class="form-control @error('quantitat') is-invalid @enderror" name="quantitat"
                                value="{{ old('quantitat') }}" placeholder="0.00" required>
                            @error('quantitat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn text-white fw-bold py-2"
                                style="background: linear-gradient(135deg, #0f3460, #5bc0be); border: none; border-radius: 10px;">
                                Enviar Bizum
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Últims 10 Bizums --}}
    <div class="row justify-content-center mt-4 mb-5">
        <div class="col-md-10 col-lg-8">
            <div class="card shadow-sm" style="border: none; border-radius: 16px;">
                <div class="card-body px-4 py-3">
                    <h6 class="text-uppercase fw-bold mb-3" style="letter-spacing: 1px; color: #0f3460;">
                        Darrers 10 Bizums
                    </h6>
                    <div class="row">
                        <div class="col-12">
                            @forelse ($ultimsBizums as $mov)
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection