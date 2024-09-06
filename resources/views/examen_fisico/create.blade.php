@extends('layouts.app')

@section('title', 'Crear Examen Físico')

@section('content')
<div class="container">
    <h1>Crear Examen Físico</h1>
    <form action="{{ route('examen_fisico.store') }}" method="POST">
        @csrf
        <div class="mb-3">

        <label for="detalle_examen_fisico_id" class="form-label">Detalle Examen Físico</label>
        @foreach($arrayDetalles as $detalle)
                <div class="form-check">
                    <input type="checkbox" name="detalle_examen_fisico_id[]" value="{{ $detalle['id']}}">
                    <label>{{ $detalle['tipo']}} - {{ $detalle['campo']}}</label> 
                
                </div>
        @endforeach
        <div class="mb-3">
            <label for="observacion" class="form-label">Observación</label>
            <textarea name="observacion" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('examen_fisico.index') }}" class="btn btn-secondary">Cancelar</a>

        <input type="hidden" name="personaId" value="{{ $personaId }}">
        

    </form>
</div>
@endsection
