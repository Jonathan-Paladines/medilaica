@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de la Relación</h1>
    <div class="mb-3">
        <label for="tcampo_id" class="form-label">Región del Cuerpo</label>
        <input type="text" name="tcampo_id" class="form-control" value="{{ $rcuerpoOef->region->tipo }}" disabled>
    </div>
    <div class="mb-3">
        <label for="campo_id" class="form-label">Opción de Examen Físico</label>
        <input type="text" name="campo_id" class="form-control" value="{{ $rcuerpoOef->opcionExamenFisico->campo }}" disabled>
    </div>
    <a href="{{ route('rcuerpo_oef.index') }}" class="btn btn-primary">Volver</a>
</div>
@endsection
