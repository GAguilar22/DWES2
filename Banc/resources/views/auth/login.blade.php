@extends('layouts.master')

@section('titulo', 'BANC IBC - Accedir')

@section('contenido')
<div class="row justify-content-center mt-5">
    <div class="col-md-5">
        <div class="card shadow" style="border: none; border-radius: 16px; overflow: hidden;">

            <div class="text-white text-center py-4"
                style="background: linear-gradient(135deg, #0f3460 0%, #16213e 100%);">
                <h4 class="fw-bold mb-0">BANC IBC</h4>
                <small style="color: rgba(255,255,255,0.65);">Accedeix al teu compte</small>
            </div>

            <div class="card-body p-4">

                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Correu electrònic</label>
                        <input id="email" type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autofocus>
                        @error('email')
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

                    <div class="mb-4 form-check">
                        <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                        <label class="form-check-label" for="remember_me">Recorda'm</label>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('register') }}" class="text-decoration-none" style="color: #5bc0be;">
                            Crear compte nou
                        </a>
                        <button type="submit" class="btn text-white fw-bold px-4"
                            style="background: linear-gradient(135deg, #0f3460, #5bc0be); border: none; border-radius: 8px;">
                            Entrar
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
