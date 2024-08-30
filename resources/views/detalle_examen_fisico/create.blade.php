@extends('layouts.app')

@section('title', 'Crear Detalle de Examen Físico')

@section('content')
<div class="container">
    <h1>Crear Detalle de Examen Físico</h1>
    
    <form action="{{ route('detalle_examen_fisico.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="rcuerpo_oef_id" class="form-label">Región Corporal/Examen Físico</label>
            {{ dd($rcuerpoOefs)}}
            <select name="rcuerpo_oef_id" class="form-control" required>

                @foreach($rcuerpoOefs as $item)
                <option value="{{ $item->id }}">{{ $item->region->tipo }} - {{ $item->opcionExamenFisico->campo }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <input type="checkbox" name="estado" value="1">
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('detalle_examen_fisico.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
