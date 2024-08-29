@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de Examen Físico</h1>
    <div class="mb-3">
        <label for="rcuerpo_oef_id" class="form-label">Región Corporal/Examen Físico</label>
        <input type="text" name="rcuerpo_oef_id" class="form-control" value="{{ $detalleExamenFisico->rcuerpoOef->region->tipo }} - {{ $detalleExamenFisico->rcuerpoOef->opcionExamenFisico->campo }}" disabled>
    </div>
    <div class="mb-3">
        <label for="estado" class="form-label">Estado</label>
        <input type="text" name="estado" class="form-control" value="{{ $detalleExamenFisico->estado ? 'Activo' : 'Inactivo' }}" disabled>
    </div>
    <a href="{{ route('detalle_examen_fisico.index') }}" class="btn btn-primary">Volver</a>
</div>
@endsection
