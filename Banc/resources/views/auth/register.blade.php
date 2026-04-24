@extends('layouts.master')

@section('titulo', 'BANC IBC - Registre')

@section('contenido')
<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="card shadow" style="border: none; border-radius: 16px; overflow: hidden;">

            <div class="text-white text-center py-4"
                style="background: linear-gradient(135deg, #0f3460 0%, #16213e 100%);">
                <h4 class="fw-bold mb-0">BANC IBC</h4>
                <small style="color: rgba(255,255,255,0.65);">Crea el teu compte</small>
            </div>

            <div class="card-body p-4">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Nom complet</label>
                        <input id="name" type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autofocus>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Correu electrònic</label>
                        <input id="email" type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="dni" class="form-label fw-semibold">DNI</label>
                        <input id="dni" type="text"
                            class="form-control @error('dni') is-invalid @enderror"
                            name="dni" value="{{ old('dni') }}" required placeholder="12345678A">
                        @error('dni')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="data_naixement" class="form-label fw-semibold">Data de Naixement</label>
                        <input id="data_naixement" type="date"
                            class="form-control @error('data_naixement') is-invalid @enderror"
                            name="data_naixement" value="{{ old('data_naixement') }}" required>
                        @error('data_naixement')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="telefon" class="form-label fw-semibold">Telèfon</label>
                        <input id="telefon" type="text"
                            class="form-control @error('telefon') is-invalid @enderror"
                            name="telefon" value="{{ old('telefon') }}" required placeholder="600123456">
                        @error('telefon')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Contrasenya</label>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            name="password" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label fw-semibold">Confirmar Contrasenya</label>
                        <input id="password_confirmation" type="password"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            name="password_confirmation" required>
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('login') }}" class="text-decoration-none" style="color: #5bc0be;">
                            Ja tens compte?
                        </a>
                        <button type="submit" class="btn text-white fw-bold px-4"
                            style="background: linear-gradient(135deg, #0f3460, #5bc0be); border: none; border-radius: 8px;">
                            Registrar-se
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
