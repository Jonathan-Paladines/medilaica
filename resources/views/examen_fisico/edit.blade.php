@extends('layouts.app')

@section('title', 'Editar Examen Físico')

@section('content')
<div class='container'>
    <h1>Editar Examen Físico</h1>
    <form action="{{ route('examen_fisico.update', $examenFisico->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="detalle_examen_fisico_id" class="form-label">Detalle Examen Físico</label>
            <select name="detalle_examen_fisico_id" class="form-control" required>
                @foreach($detalles as $detalle)
                    <option value="{{ $detalle->id }}" {{ $detalle->id == $examenFisico->detalle_examen_fisico_id ? 'selected' : '' }}>
                        {{ $detalle->estado }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="observacion" class="form-label">Observación</label>
            <textarea name="observacion" class="form-control" required>{{ $examenFisico->observacion }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('examen_fisico.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
