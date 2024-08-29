@extends('layouts.app')

@section('title', 'Ingreso de Resultados de Exámen Físico')

@section('content')
<div class="container">
    <h1>Exámen Físico</h1>
    <form action="{{ route('consulta_examen_fisico.store') }}" method="POST">
        @csrf
        <div class="form-group col-sm-3 mb-3">
            <label for="campo">Campo:</label>
            <select name="id_tipoalergias" class="form-control" id="id_tipoalergias" required>
                @foreach($campos as $campo)
                    <option value="{{ $campo->id }}">{{ $campo->campo }}</option>
                @endforeach
            </select>
            <input type="text" class="form-control" name="campo" id="campo" required>
        </div>
        <div class="form-group col-sm-3 mb-3">
            <label for="estado">Estado:</label>
            <textarea class="form-control" name="estado" id="estado" required></textarea>
        </div>
        <div class="form-group col-sm-3 mb-3">
            <label for="observacion">Observación:</label>
            <textarea class="form-control" name="observacion" id="observacion required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ url()->previous() }}" class="btn btn-warning">Volver</a>
    </form>
</div>
@endsection
