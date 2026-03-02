@extends('layouts.master')

@section('titulo', 'Detalls de l\'Estudiant')

@section('contenido')

    <div class="d-flex justify-content-between align-items-center my-4">
        <h2>Detalls de l'Estudiant</h2>
        <a href="{{ route('estudiants.index') }}" class="btn btn-secondary">Tornar al llistat</a>
    </div>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <p><strong>Nom:</strong> {{ $estudiant->nom }}</p>
                    <p><strong>Email:</strong> {{ $estudiant->email }}</p>
                    <p><strong>Adreça:</strong> {{ $estudiant->adresa }}</p>
                </div>
            </div>
        </div>
    </div>

@endsection