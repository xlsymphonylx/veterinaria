@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detalles de la Enfermedad</div>

                    <div class="card-body">

                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $disease->name }}" placeholder="Ingrese el título" required>
                        </div>

                        <div class="form-group mt-3">
                            <label for="treatment_id">Tratamiento</label>
                            <select class="form-control" id="treatment_id" name="treatment_id" required>
                                @foreach ($treatments as $treatment)
                                    <option value="{{ $treatment->id }}"
                                        {{ $treatment->id == $disease->treatment_id ? 'selected' : '' }}>
                                        {{ $treatment->name . ' - ' . $treatment->patient->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <a href="{{ route('diseases.edit', $disease->id) }}" class="btn btn-primary mt-3">Editar</a>
                        <a href="{{ route('diseases.index') }}" class="btn btn-danger mt-3">Regresar</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
