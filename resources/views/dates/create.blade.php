@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Agregar Nueva Cita</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('dates.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="title">Título</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="Ingrese el título" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="description">Descripción</label>
                                <input type="text" class="form-control" id="description" name="description"
                                    placeholder="Ingrese la descripción" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="datetime">Fecha y Hora</label>
                                <input type="datetime-local" class="form-control" id="datetime" name="datetime" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="patient_id">Paciente</label>
                                <select class="form-control" id="patient_id" name="patient_id" required>
                                    @foreach ($patients as $patient)
                                        <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Guardar</button>
                            <a href="{{ route('dates.index') }}" class="btn btn-danger mt-3">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
