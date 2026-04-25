@extends('layouts.master')

@section('titulo', 'CaixaForta - Editar Tipus')

@section('contenido')
    <div class="container py-4">

        <div class="mb-4">
            <h3 class="mb-0 fw-bold">Editar Tipus de Compte</h3>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm" style="border: none; border-radius: 16px; overflow: hidden;">

                    <div class="text-white text-center py-4"
                        style="background: linear-gradient(135deg, #0f3460 0%, #16213e 100%);">
                        <div class="rounded-circle bg-white text-dark d-flex align-items-center justify-content-center mx-auto mb-3"
                            style="width: 72px; height: 72px; font-size: 1.8rem; font-weight: bold;">
                            TC
                        </div>
                        <h5 class="fw-bold mb-0">{{ $tipus->nom }}</h5>
                        <small style="color: rgba(255,255,255,0.65);">Tipus de Compte</small>
                    </div>

                    <div class="card-body px-4 py-4">

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.tipus.update', $tipus->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nom" class="form-label fw-semibold">Nom del tipus</label>
                                <input type="text" id="nom" name="nom"
                                    class="form-control @error('nom') is-invalid @enderror"
                                    value="{{ old('nom', $tipus->nom) }}" required>
                                @error('nom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="descripcio" class="form-label fw-semibold">Descripció</label>
                                <textarea id="descripcio" name="descripcio" rows="3"
                                    class="form-control @error('descripcio') is-invalid @enderror">{{ old('descripcio', $tipus->descripcio) }}</textarea>
                                @error('descripcio')
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