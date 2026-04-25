@extends('layouts.master')

@section('titulo', 'CaixaForta - Editar Compte')

@section('contenido')
    <div class="container py-4">

        <div class="mb-4">
            <h3 class="mb-0 fw-bold">Editar Compte Bancari</h3>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card shadow-sm" style="border: none; border-radius: 16px; overflow: hidden;">

                    <div class="text-white text-center py-4"
                        style="background: linear-gradient(135deg, #0f3460 0%, #16213e 100%);">
                        <div class="rounded-circle bg-white text-dark d-flex align-items-center justify-content-center mx-auto mb-3"
                            style="width: 72px; height: 72px; font-size: 1.5rem; font-weight: bold;">
                            💳
                        </div>
                        <h5 class="fw-bold mb-0">{{ $compte->alias ?? $compte->tipus->nom }}</h5>
                        <small style="color: rgba(255,255,255,0.65);">{{ $compte->client->user->name }}</small>
                    </div>

                    <div class="card-body px-4 py-4">

                        {{-- IBAN (no editable) --}}
                        <div class="mb-3 p-3 rounded-3" style="background: #f8f9fa;">
                            <div class="text-muted"
                                style="font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.5px;">IBAN (no
                                editable)</div>
                            <div class="fw-semibold font-monospace" style="font-size: 0.85rem;">{{ $compte->iban }}</div>
                        </div>

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.comptes.update', $compte->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="alias" class="form-label fw-semibold">Àlies</label>
                                <input type="text" id="alias" name="alias"
                                    class="form-control @error('alias') is-invalid @enderror"
                                    value="{{ old('alias', $compte->alias) }}"
                                    placeholder="Deixa buit per usar el nom del tipus">
                                @error('alias')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tipus_id" class="form-label fw-semibold">Tipus de Compte</label>
                                <select id="tipus_id" name="tipus_id"
                                    class="form-select @error('tipus_id') is-invalid @enderror" required>
                                    @foreach($tipusList as $t)
                                        <option value="{{ $t->id }}" {{ $compte->tipus_id == $t->id ? 'selected' : '' }}>
                                            {{ $t->nom }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('tipus_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="saldo" class="form-label fw-semibold">
                                    Saldo
                                </label>
                                <div class="input-group">
                                    <input type="number" id="saldo" name="saldo" step="0.01" min="0"
                                        class="form-control @error('saldo') is-invalid @enderror"
                                        value="{{ old('saldo', $compte->saldo) }}" required>
                                    <span class="input-group-text">€</span>
                                </div>
                                @error('saldo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-success fw-bold px-4">Guardar canvis</button>
                                <a href="{{ route('admin.index') }}" class="btn btn-secondary">Cancel·lar</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection