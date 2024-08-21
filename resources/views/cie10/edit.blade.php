@extends('layouts.app')

@section('title', 'Editar Enfermedad')

@section('content')
<div class='container'>
    <h1>Editar Enfermedad en base a CIE10</h1>
    <form action="{{ route('cie10.update', $Cie10->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group col-sm-3 mb-3">
            <label for="codigo">Código:</label>
            <input type="text" name="codigo" class="form-control" id="codigo" value="{{ $Cie10->codigo }}" required>
        </div>
        <div class="form-group col-sm-3 mb-3">
            <label for="detalle_cie">Enfermedad:</label>
            <textarea name="detalle_cie" class="form-control" id="detalle_cie" required>{{ $$Cie10->detalle_cie }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ url()->previous() }}" class="btn btn-warning">Volver</a>
    </form>
</div>
@endsection
