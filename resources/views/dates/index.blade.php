@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Citas</div>

                    <div class="card-body">
                        <a href="{{ route('dates.create') }}" class="btn btn-primary mb-3">Agregar Nueva Cita</a>

                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Descripción</th>
                                    <th>Fecha y Hora</th>
                                    <th>Paciente</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dates as $date)
                                    <tr>
                                        <td>{{ $date->title }}</td>
                                        <td>{{ $date->description }}</td>
                                        <td>{{ $date->datetime }}</td>
                                        <td>{{ $date->patient->name }}</td>
                                        <td>
                                            <a href="{{ route('dates.show', $date->id) }}" class="btn btn-info">Ver</a>
                                            <a href="{{ route('dates.edit', $date->id) }}"
                                                class="btn btn-primary">Editar</a>
                                            <form action="{{ route('dates.destroy', $date->id) }}" method="POST"
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
