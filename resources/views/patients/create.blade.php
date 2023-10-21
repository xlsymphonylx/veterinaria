@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Agregar Nuevo Paciente</div>

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
                        <form method="POST" action="{{ route('patients.store') }}" enctype="multipart/form-data">
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
                            <div class="form-group  mt-3">
                                <label for="profile_image">Imagen</label>
                                <input type="file" class="form-control" id="profile_image" name="profile_image">
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
