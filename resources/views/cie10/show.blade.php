@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de Catálogo Internacional de Enfermedades</h1>
    <div class="mb-3">
        <label for="codigo" class="form-label">Código</label>
        <input type="text" name="codigo" class="form-control" value="{{ $cie10->codigo }}" disabled>
    </div>
    <div class="mb-3">
        <label for="detalle_cie" class="form-label">Descripción</label>
        <textarea name="detalle_cie" class="form-control" disabled>{{ $cie10->detalle_cie }}</textarea>
    <a href="{{ url('/') }}" class="btn btn-primary">Volver</a>
</div>
@endsection
