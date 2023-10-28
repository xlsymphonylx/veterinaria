@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card auth-bg">
                    <div class="card-header auth-bg__accent text-light fw-bold">Citas</div>

                    <div class="card-body">
                        <a href="{{ route('dates.create') }}" class="btn fw-bold btn-primary mb-3">Agregar Nueva Cita</a>

                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table auth-bg">
                            <thead>
                                <tr >
                                    <th class="auth-bg__accent text-light fw-bold">Título</th>
                                    <th class="auth-bg__accent text-light fw-bold">Descripción</th>
                                    <th class="auth-bg__accent text-light fw-bold">Fecha y Hora</th>
                                    <th class="auth-bg__accent text-light fw-bold">Paciente</th>
                                    <th class="auth-bg__accent text-light fw-bold">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dates as $date)
                                    <tr>
                                        <td class="auth-bg text-light fw-bold">{{ $date->title }}</td>
                                        <td class="auth-bg text-light fw-bold">{{ $date->description }}</td>
                                        <td class="auth-bg text-light fw-bold">{{ $date->datetime }}</td>
                                        <td class="auth-bg text-light fw-bold">{{ $date->patient->name }}</td>
                                        <td class="auth-bg text-light fw-bold">
                                            <a href="{{ route('dates.show', $date->id) }}" class="btn fw-bold btn-info">Ver</a>
                                            <a href="{{ route('dates.edit', $date->id) }}"
                                                class="btn fw-bold btn-primary">Editar</a>
                                            <form action="{{ route('dates.destroy', $date->id) }}" method="POST"
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
