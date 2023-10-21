@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Enfermedades</div>

                    <div class="card-body">
                        <a href="{{ route('diseases.create') }}" class="btn btn-primary mb-3">Agregar Nueva Enfermedad</a>

                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Tratamiento</th>
                                    <th>Paciente</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($diseases as $disease)
                                    <tr>
                                        <td>{{ $disease->name }}</td>
                                        <td>{{ $disease->treatment->name }}</td>
                                        <td>{{ $disease->treatment->patient->name }}</td>
                                        <td>
                                            <a href="{{ route('diseases.show', $disease->id) }}"
                                                class="btn btn-info">Ver</a>
                                            <a href="{{ route('diseases.edit', $disease->id) }}"
                                                class="btn btn-primary">Editar</a>
                                            <form action="{{ route('diseases.destroy', $disease->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
