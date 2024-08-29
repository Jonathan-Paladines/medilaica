@extends('layouts.app')

@section('title', 'Crear Relación entre Región del Cuerpo y Opción de Examen Físico')

@section('content')
<div class="container">
    <h1>Crear Relación</h1>
    <form action="{{ route('rcuerpo_oef.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="tcampo_id" class="form-label">Región del Cuerpo</label>
            <select name="tcampo_id" class="form-control" required>
                <!-- Suponiendo que tienes una variable $regiones que contiene las regiones del cuerpo -->
                @foreach($regiones as $region)
                    <option value="{{ $region->id }}">{{ $region->tipo }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="campo_id" class="form-label">Opción de Examen Físico</label>
            <select name="campo_id" class="form-control" required>
                <!-- Suponiendo que tienes una variable $opciones que contiene las opciones de examen físico -->
                @foreach($opciones as $opcion)
                    <option value="{{ $opcion->id }}">{{ $opcion->campo }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('rcuerpo_oef.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
