@extends('layouts.master')

@section('titulo', 'CaixaForta - Accedir')

@section('contenido')
    <div class="d-flex align-items-center justify-content-center" style="min-height: 80vh;">
        <div class="card shadow-lg border-0 overflow-hidden w-100" style="max-width: 860px; border-radius: 20px;">
            <div class="row g-0">

                {{-- COLUMNA ESQUERRA: Branding i descripció --}}
                <div class="col-md-6 text-white d-flex flex-column justify-content-center p-5"
                    style="background: linear-gradient(160deg, #0f3460 0%, #16213e 60%, #0a1628 100%);">

                    {{-- Logo / Títol --}}
                    <div class="mb-4">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 52px; height: 52px; background: rgba(255,255,255,0.15); font-size: 1.5rem;">
                                🔐
                            </div>
                            <h2 class="fw-bold mb-0" style="letter-spacing: 1px;">CaixaForta</h2>
                        </div>
                        <div style="height: 3px; width: 50px; background: #5bc0be; border-radius: 2px;"></div>
                    </div>

                    {{-- Descripció --}}
                    <div style="color: rgba(255,255,255,0.85); line-height: 1.8; font-size: 0.95rem;">
                        <p class="mb-3">
                            A <strong>CaixaForta</strong> pots controlar els teus diners sense cap
                            preocupació ni sorpreses. Consulta el teu saldo en temps real i
                            mantén-te sempre informat.
                        </p>
                        <p class="mb-3">
                            Envia i rep diners al moment amb el nostre sistema de
                            <strong>Bizum integrat</strong>. Ràpid, segur i sense comissions.
                        </p>
                        <p class="mb-3">
                            Gestiona tots els teus comptes des d'un sol lloc. Estalvis,
                            compte corrent o inversions: tot centralitzat i accessible
                            les 24 hores del dia.
                        </p>
                        <p class="mb-3">
                            Consulta l'historial complet dels teus moviments i tingues
                            sempre un registre clar de les teves transaccions.
                        </p>
                    </div>

                </div>

                {{-- COLUMNA DRETA: Formulari de login --}}
                <div class="col-md-6 bg-white d-flex flex-column justify-content-center p-5">

                    <h5 class="fw-bold mb-1" style="color: #0f3460;">Benvingut de nou</h5>
                    <p class="text-muted mb-4" style="font-size: 0.88rem;">Introdueix les teves credencials per accedir</p>

                    @if (session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold" style="font-size: 0.88rem;">Correu
                                electrònic</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autofocus
                                style="border-radius: 10px; border-color: #dee2e6;">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold"
                                style="font-size: 0.88rem;">Contrasenya</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                style="border-radius: 10px; border-color: #dee2e6;">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4 form-check">
                            <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                            <label class="form-check-label" for="remember_me" style="font-size: 0.88rem;">Recorda'm</label>
                        </div>

                        <button type="submit" class="btn w-100 text-white fw-bold py-2"
                            style="background: linear-gradient(135deg, #0f3460, #5bc0be); border: none; border-radius: 10px; font-size: 0.95rem;">
                            Entrar
                        </button>

                        <p class="text-center mt-3 mb-0" style="font-size: 0.85rem;">
                            Encara no tens compte?
                            <a href="{{ route('register') }}" class="fw-semibold text-decoration-none"
                                style="color: #0f3460;">
                                Registra't ara
                            </a>
                        </p>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection