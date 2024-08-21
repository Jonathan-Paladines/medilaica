@extends('layouts.app')

@section('title', 'Crear Consulta Médica')

@section('content')
<div class="container">
    <h1>Crear Consulta Médica</h1>
    <form action="{{ route('consulta_medica.store') }}" method="POST">
        @csrf
        <div class="form-group col-sm-3 mb-3">
            <label for="motivo_de_consulta">Motivo de Consulta:</label>
            <input type="text" class="form-control" name="motivo_de_consulta" id="motivo_de_consulta" required>
        </div>
        <div class="form-group col-sm-3 mb-3">
            <label for="Enfermedad_actual">Enfermedad Actual:</label>
            <textarea class="form-control" name="enfermedad_actual" id="enfermedad_actual" required></textarea>
        </div>
        <div class="form-group col-sm-3 mb-3">
            <label for="Tratamiento">Tratamiento:</label>
            <textarea class="form-control" name="tratamiento" id="tratamiento" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ url()->previous() }}" class="btn btn-warning">Volver</a>
    </form>
</div>
@endsection
