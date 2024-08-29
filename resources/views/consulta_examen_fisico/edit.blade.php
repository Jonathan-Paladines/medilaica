@extends('layouts.app')

@section('title', 'Editar Examen Físico')

@section('content')
<div class='container'>
    <h1>Editar Examen Físico</h1>
    <form action="{{ route('consulta_examen_fisico.update', $consultaExamenFisico->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group col-sm-3 mb-3">
            <label for="campo">Campo:</label>
            <input type="text" name="campo" class="form-control" id="campo" value="{{ $consultaExamenFisico->campo }}" required>
        </div>
        <div class="form-group col-sm-3 mb-3">
            <label for="estado">Estado:</label>
            <textarea name="estado" class="form-control" id="estado" required>{{ $consultaExamenFisico->estado }}</textarea>
        </div>
        <div class="form-group col-sm-3 mb-3">
            <label for="observacion">Observación:</label>
            <textarea name="observacion" class="form-control" id="observacion" required>{{ $consultaExamenFisico->observacion }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ url()->previous() }}" class="btn btn-warning">Volver</a>
    </form>
</div>
@endsection
