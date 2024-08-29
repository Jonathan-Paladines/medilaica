@extends('layouts.app')

@section('title', 'Editar Relación entre Región del Cuerpo y Opción de Examen Físico')

@section('content')
<div class="container">
    <h1>Editar Relación</h1>
    <form action="{{ route('rcuerpo_oef.update', $rcuerpoOef->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="tcampo_id" class="form-label">Región del Cuerpo</label>
            <select name="tcampo_id" class="form-control" required>
                @foreach($regiones as $region)
                    <option value="{{ $region->id }}" {{ $region->id == $rcuerpoOef->tcampo_id ? 'selected' : '' }}>{{ $region->tipo }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="campo_id" class="form-label">Opción de Examen Físico</label>
            <select name="campo_id" class="form-control" required>
                @foreach($opciones as $opcion)
                    <option value="{{ $opcion->id }}" {{ $opcion->id == $rcuerpoOef->campo_id ? 'selected' : '' }}>{{ $opcion->campo }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('rcuerpo_oef.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
