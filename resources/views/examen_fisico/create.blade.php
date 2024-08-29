@extends('layouts.app')

@section('title', 'Crear Examen Físico')

@section('content')
<div class="container">
    <h1>Crear Examen Físico</h1>
    <form action="{{ route('examen_fisico.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="detalle_examen_fisico_id" class="form-label">Detalle Examen Físico</label>
            <select name="detalle_examen_fisico_id" class="form-control" required>
                @foreach($detalles as $detalle)
                    <option value="{{ $detalle->id }}">{{ $detalle->estado }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="observacion" class="form-label">Observación</label>
            <textarea name="observacion" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('examen_fisico.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
