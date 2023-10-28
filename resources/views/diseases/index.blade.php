@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card auth-bg">
                    <div class="card-header auth-bg__accent text-light fw-bold">Enfermedades</div>

                    <div class="card-body">
                        <a href="{{ route('diseases.create') }}" class="btn fw-bold btn-primary mb-3">Agregar Nueva Enfermedad</a>

                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="auth-bg__accent text-light fw-bold">Nombre</th>
                                    <th class="auth-bg__accent text-light fw-bold">Tratamiento</th>
                                    <th class="auth-bg__accent text-light fw-bold">Paciente</th>
                                    <th class="auth-bg__accent text-light fw-bold">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($diseases as $disease)
                                    <tr>
                                        <td class="auth-bg text-light fw-bold">{{ $disease->name }}</td>
                                        <td class="auth-bg text-light fw-bold">{{ $disease->treatment->name ?? 'No Seleccionado' }}</td>
                                        <td class="auth-bg text-light fw-bold">{{ $disease->patient->name }}</td>
                                        <td class="auth-bg text-light fw-bold">
                                            <a href="{{ route('diseases.show', $disease->id) }}"
                                                class="btn fw-bold btn-info">Ver</a>
                                            <a href="{{ route('diseases.edit', $disease->id) }}"
                                                class="btn fw-bold btn-primary">Editar</a>
                                            <form action="{{ route('diseases.destroy', $disease->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn fw-bold btn-danger"
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
