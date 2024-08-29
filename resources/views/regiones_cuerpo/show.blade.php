@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de Región del Cuerpo</h1>
    
    <div class="mb-3">
        <label for="id" class="form-label">ID</label>
        <input type="text" name="id" class="form-control" value="{{ $region->id }}" disabled>
    </div>
    <div class="mb-3">
        <label for="tipo" class="form-label">Tipo</label>
        <input type="text" name="tipo" class="form-control" value="{{ $region->tipo }}" disabled>
    </div>
    <a href="{{ url('/regiones_cuerpo') }}" class="btn btn-primary">Volver</a>
</div>
@endsection
