@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tratamientos</div>

                    <div class="card-body">
                        <a href="{{ route('treatments.create') }}" class="btn btn-primary mb-3">Agregar Nueva Tratamiento</a>

                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Paciente</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($treatments as $treatment)
                                    <tr>
                                        <td>{{ $treatment->name }}</td>

                                        <td>{{ $treatment->patient->name }}</td>
                                        <td>
                                            <a href="{{ route('treatments.show', $treatment->id) }}" class="btn btn-info">Ver</a>
                                            <a href="{{ route('treatments.edit', $treatment->id) }}"
                                                class="btn btn-primary">Editar</a>
                                            <form action="{{ route('treatments.destroy', $treatment->id) }}" method="POST"
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
