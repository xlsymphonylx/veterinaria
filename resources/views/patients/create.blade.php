@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Agregar Nuevo Paciente</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('patients.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Ingrese el nombre" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="age">Edad</label>
                                <input type="number" class="form-control" id="age" name="age"
                                    placeholder="Ingrese la edad" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="race">Raza</label>
                                <input type="text" class="form-control" id="race" name="race"
                                    placeholder="Ingrese la raza" required>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Guardar</button>
                            <a href="{{ route('patients.index') }}" class="btn btn-danger mt-3">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
