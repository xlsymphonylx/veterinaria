@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detalles del Tratamiento</div>

                    <div class="card-body">

                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $treatment->name }}" placeholder="Ingrese el título" required>
                        </div>

                        <div class="form-group mt-3">
                            <label for="patient_id">Paciente</label>
                            <select class="form-control" id="patient_id" name="patient_id" required>
                                @foreach ($patients as $patient)
                                    <option value="{{ $patient->id }}"
                                        {{ $patient->id == $treatment->patient_id ? 'selected' : '' }}>
                                        {{ $patient->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <a href="{{ route('treatments.edit', $treatment->id) }}" class="btn btn-primary mt-3">Editar</a>
                        <a href="{{ route('treatments.index') }}" class="btn btn-danger mt-3">Regresar</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
