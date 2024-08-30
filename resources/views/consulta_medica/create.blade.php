@extends('layouts.app')

@section('title', 'Crear Consulta Médica')

@section('content')
<div class="container">
    <h1>Crear Consulta Médica</h1>

    <form action="{{ route('consulta_medica.store') }}" method="POST">
    @csrf
    <!-- Seleccionar paciente -->
    <div class="form-group col-sm-6 mb-3">
        <label for="persona_id">Paciente:</label>
        <select name="persona_id" class="form-control">
            @foreach($personas as $paciente)
                <option value="{{ $paciente->id }}">{{ $paciente->nombres}} - {{ $paciente->apellidos }}</option>
            @endforeach
        </select>
    </div>

    <!-- Seleccionar examen físico -->
    <div class="form-group col-sm-6 mb-3">
        <label for="examen_fisico_id">Examen Físico:</label>
        <select name="examen_fisico_id" class="form-control">
            @foreach($examenes_fisicos as $examen)
                <option value="{{ $examen->id }}">{{ $examen->nombre }}</option>
            @endforeach
        </select>
    </div>

    <!-- Motivo de consulta -->
    <div class="form-group col-sm-6 mb-3">
        <label for="motivo_consulta">Motivo de Consulta:</label>
        <textarea name="motivo_consulta" class="form-control"></textarea>
    </div>

    <!-- Diagnóstico -->
    <div class="form-group col-sm-6 mb-3">
        <label for="diagnostico">Diagnóstico:</label>
        <textarea name="diagnostico" class="form-control"></textarea>
    </div>

    <!-- Tratamiento -->
    <div class="form-group col-sm-6 mb-3">
        <label for="tratamiento">Tratamiento:</label>
        <textarea name="tratamiento" class="form-control"></textarea>
    </div>

    <!-- Observaciones -->
    <div class="form-group col-sm-6 mb-3">
        <label for="observaciones">Observaciones:</label>
        <textarea name="observaciones" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Guardar Consulta</button>
    <a href="{{ url()->previous() }}" class="btn btn-warning">Volver</a>
</form>

</div>
@endsection
