@extends('layouts.master')

@section('titulo', 'Llistat d\'Estudiants')

@section('contenido')

    <div class="d-flex justify-content-between align-items-center my-4">
        <h2>Llistat d'Estudiants</h2>
        <a href="{{ route('students.create') }}" class="btn btn-primary">Nou Estudiant</a>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Adreça</th>
                <th>Accions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->address }}</td>
                    <td>
                        <a href="{{ route('students.show', $student) }}" class="btn btn-sm btn-info">Veure</a>
                        <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Estàs segur que vols eliminar aquest estudiant?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection