@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detalles del Paciente</div>

                    <div class="card-body">
                        <div class="form-group ">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $patient->name }}" readonly>
                        </div>

                        <div class="form-group mt-3">
                            <label for="age">Edad</label>
                            <input type="text" class="form-control" id="age" name="age"
                                value="{{ $patient->age }}" readonly>
                        </div>

                        <div class="form-group mt-3">
                            <label for="race">Raza</label>
                            <input type="text" class="form-control" id="race" name="race"
                                value="{{ $patient->race }}" readonly>
                        </div>

                        <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-primary mt-3">Editar</a>
                        <a href="{{ route('patients.index') }}" class="btn btn-danger mt-3">Regresar</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
