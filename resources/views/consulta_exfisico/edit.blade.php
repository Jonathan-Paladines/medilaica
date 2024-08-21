@extends('layouts.app')

@section('title', 'Editar Consulta Médica')

@section('content')
<div class='container'>
    <h1>Editar Consulta Médica</h1>
    <form action="{{ route('consulta_medica.update', $consultaMedica->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group col-sm-3 mb-3">
            <label for="motivo_de_consulta">Motivo de Consulta:</label>
            <input type="text" name="motivo_de_consulta" class="form-control" id="motivo_de_consulta" value="{{ $consultaMedica->motivo_de_consulta }}" required>
        </div>
        <div class="form-group col-sm-3 mb-3">
            <label for="Enfermedad_actual">Enfermedad Actual:</label>
            <textarea name="enfermedad_actual" class="form-control" id="enfermedad_actual" required>{{ $consultaMedica->Enfermedad_actual }}</textarea>
        </div>
        <div class="form-group col-sm-3 mb-3">
            <label for="Tratamiento">Tratamiento:</label>
            <textarea name="tratamiento" class="form-control" id="tratamiento" required>{{ $consultaMedica->Tratamiento }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ url()->previous() }}" class="btn btn-warning">Volver</a>
    </form>
</div>
@endsection
