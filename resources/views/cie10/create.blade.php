@extends('layouts.app')

@section('title', 'Crear Enfermedad Según CIE10')

@section('content')
<div class="container">
    <h1>Crear Enfermedad</h1>
    <form action="{{ route('cie10.store') }}" method="POST">
        @csrf
        <div class="form-group col-sm-3 mb-3">
            <label for="codigo">Código:</label>
            <input type="text" class="form-control" name="codigo" id="codigo" required>
        </div>
        <div class="form-group col-sm-3 mb-3">
            <label for="detalle_cie">Enfermedad:</label>
            <textarea class="form-control" name="detalle_cie" id="detalle_cie" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ url()->previous() }}" class="btn btn-warning">Volver</a>
    </form>
</div>
@endsection
