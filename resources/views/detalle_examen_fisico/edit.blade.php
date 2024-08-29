@extends('layouts.app')

@section('title', 'Editar Detalle de Examen Físico')

@section('content')
<div class='container'>
    <h1>Editar Detalle de Examen Físico</h1>
    <form action="{{ route('detalle_examen_fisico.update', $detalleExamenFisico->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="rcuerpo_oef_id" class="form-label">Región Corporal/Examen Físico</label>
            <select name="rcuerpo_oef_id" class="form-control" required>
                @foreach($rcuerpoOefs as $item)
                    <option value="{{ $item->id }}" {{ $detalleExamenFisico->rcuerpo_oef_id == $item->id ? 'selected' : '' }}>
                        {{ $item->region->tipo }} - {{ $item->opcionExamenFisico->campo }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <input type="checkbox" name="estado" value="1" {{ $detalleExamenFisico->estado ? 'checked' : '' }}>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('detalle_examen_fisico.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
