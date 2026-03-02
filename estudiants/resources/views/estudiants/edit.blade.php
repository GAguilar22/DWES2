@extends('layouts.master')

@section('titulo', 'Editar Estudiant')

@section('contenido')

    <div class="d-flex justify-content-between align-items-center my-4">
        <h2>Editar Estudiant</h2>
        <a href="{{ route('estudiants.index') }}" class="btn btn-secondary">Tornar al llistat</a>
    </div>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('estudiants.update', $estudiant) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Nom --}}
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom"
                                value="{{ old('nom', $estudiant->nom) }}" placeholder="Introdueix el nom">
                            @error('nom')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email', $estudiant->email) }}"
                                placeholder="Introdueix el correu electrònic">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Adreça --}}
                        <div class="mb-3">
                            <label for="adresa" class="form-label">Adreça</label>
                            <input type="text" class="form-control @error('adresa') is-invalid @enderror" id="adresa"
                                name="adresa" value="{{ old('adresa', $estudiant->adresa) }}"
                                placeholder="Introdueix l'adreça">
                            @error('adresa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Actualitzar Estudiant</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection