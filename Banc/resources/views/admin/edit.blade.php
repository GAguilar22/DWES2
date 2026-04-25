@extends('layouts.master')

@section('titulo', 'CaixaForta - Editar Client')

@section('contenido')
    <div class="container py-4">

        <div class="d-flex align-items-center gap-2 mb-4">
            <h3 class="mb-0 fw-bold">Editar Client</h3>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card shadow-sm" style="border: none; border-radius: 16px; overflow: hidden;">

                    <div class="text-white text-center py-4"
                        style="background: linear-gradient(135deg, #0f3460 0%, #16213e 100%);">
                        <div class="rounded-circle bg-white text-dark d-flex align-items-center justify-content-center mx-auto mb-3"
                            style="width: 72px; height: 72px; font-size: 1.8rem; font-weight: bold;">
                            {{ strtoupper(substr($client->user->name, 0, 1)) }}
                        </div>
                        <h5 class="fw-bold mb-0">{{ $client->user->name }}</h5>
                        <small style="color: rgba(255,255,255,0.65);">Client BANC Gerard</small>
                    </div>

                    <div class="card-body">

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.clients.update', $client) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <h6 class="text-muted text-uppercase fw-bold mb-3"
                                style="font-size: 0.75rem; letter-spacing: 1px;">
                                Dades d'accés
                            </h6>

                            <div class="mb-3">
                                <label for="name" class="form-label fw-semibold">Nom complet</label>
                                <input type="text" id="name" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $client->user->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="email" class="form-label fw-semibold">Correu electrònic</label>
                                <input type="email" id="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', $client->user->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <hr>

                            <h6 class="text-muted text-uppercase fw-bold mb-3 mt-3"
                                style="font-size: 0.75rem; letter-spacing: 1px;">
                                Dades personals
                            </h6>

                            <div class="mb-3">
                                <label for="dni" class="form-label fw-semibold">DNI</label>
                                <input type="text" id="dni" name="dni"
                                    class="form-control @error('dni') is-invalid @enderror"
                                    value="{{ old('dni', $client->dni) }}" required>
                                @error('dni')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="data_naixement" class="form-label fw-semibold">Data de naixement</label>
                                <input type="date" id="data_naixement" name="data_naixement"
                                    class="form-control @error('data_naixement') is-invalid @enderror"
                                    value="{{ old('data_naixement', $client->data_naixement) }}" required>
                                @error('data_naixement')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="telefon" class="form-label fw-semibold">Telèfon</label>
                                <input type="text" id="telefon" name="telefon"
                                    class="form-control @error('telefon') is-invalid @enderror"
                                    value="{{ old('telefon', $client->telefon) }}" required>
                                @error('telefon')
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