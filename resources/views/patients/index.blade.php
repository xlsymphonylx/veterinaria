@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Pacientes</div>

                    <div class="card-body">
                        <a href="{{ route('patients.create') }}" class="btn btn-primary mb-3">Agregar Nuevo Paciente</a>

                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Edad</th>
                                    <th>Raza</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($patients as $patient)
                                    <tr>
                                        <td>{{ $patient->name }}</td>
                                        <td>{{ $patient->age }}</td>
                                        <td>{{ $patient->race }}</td>
                                        <td>
                                            <a href="{{ route('patients.show', $patient->id) }}"
                                                class="btn btn-info">Ver</a>
                                            <a href="{{ route('patients.edit', $patient->id) }}"
                                                class="btn btn-primary">Editar</a>
                                            <form action="{{ route('patients.destroy', $patient->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Estas seguro?')">Eliminar</button>
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
