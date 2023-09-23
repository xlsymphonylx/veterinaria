@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Información del Paciente</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('patients.update', $patient->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $patient->name }}" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="age">Edad</label>
                                <input type="number" class="form-control" id="age" name="age"
                                    value="{{ $patient->age }}" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="race">Raza</label>
                                <input type="text" class="form-control" id="race" name="race"
                                    value="{{ $patient->race }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Guardar Cambios</button>
                            <a href="{{ route('patients.index') }}" class="btn btn-danger mt-3">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
