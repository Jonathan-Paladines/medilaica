@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Examen Físico</h1>
    <div class="mb-3">
        <label for="detalle" class="form-label">Detalle Examen Físico</label>
        <input type="text" class="form-control" value="{{ $examenFisico->detalle->estado }}" disabled>
    </div>
    <div class="mb-3">
        <label for="observacion" class="form-label">Observación</label>
        <textarea class="form-control" disabled>{{ $examenFisico->observacion }}</textarea>
    </div>
    <a href="{{ route('examen_fisico.index') }}" class="btn btn-primary">Volver</a>
</div>
@endsection
