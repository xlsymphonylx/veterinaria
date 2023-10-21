@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Agregar Nueva Enfermedad</div>

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
                        <form method="POST" action="{{ route('diseases.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Ingrese el título" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="treatment_id">Tratamiento</label>
                                <select class="form-control" id="treatment_id" name="treatment_id" required>
                                    @foreach ($treatments as $treatment)
                                        <option value="{{ $treatment->id }}">
                                            {{ $treatment->name . ' - ' . $treatment->patient->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Guardar</button>
                            <a href="{{ route('diseases.index') }}" class="btn btn-danger mt-3">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
