@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detalles de la Cita</div>

                    <div class="card-body">

                        <div class="form-group">
                            <label for="title">Título</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ $date->title }}" required>
                        </div>

                        <div class="form-group mt-3">
                            <label for="description">Descripción</label>
                            <input type="text" class="form-control" id="description" name="description"
                                value="{{ $date->description }}" required>
                        </div>

                        <div class="form-group mt-3">
                            <label for="datetime">Fecha y Hora</label>
                            <input type="datetime-local" class="form-control" id="datetime" name="datetime"
                                value="{{ \Carbon\Carbon::parse($date->datetime)->format('Y-m-d\TH:i') }}" required>
                        </div>

                        <div class="form-group mt-3">
                            <label for="patient_id">Paciente</label>
                            <select class="form-control" id="patient_id" name="patient_id" required>
                                @foreach ($patients as $patient)
                                    <option value="{{ $patient->id }}"
                                        {{ $patient->id == $date->patient_id ? 'selected' : '' }}>
                                        {{ $patient->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <a href="{{ route('dates.edit', $date->id) }}" class="btn btn-primary mt-3">Editar</a>
                        <a href="{{ route('dates.index') }}" class="btn btn-danger mt-3">Regresar</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
