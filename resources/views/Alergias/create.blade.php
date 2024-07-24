@extends('layouts.app')

@section('title', 'Crear Persona')

@section('content')
<div class="container">
    <h1>Crear Alergia</h1>
    <form action="{{ route('alergias.store') }}" method="POST">
        @csrf
        <div class="form-group col-sm-3 mb-3">
            <label for="nombrealergia">Nombre de Alergia:</label>
            <input type="text" class="form-control" name="nombrealergia" id="nombrealergia" required>
        </div>
        <div class="form-group col-sm-3 mb-3">
            <label for="id_tipoalergias">Tipo de Alergia:</label>
            <select name="id_tipoalergias" class="form-control" id="id_tipoalergias" required>
                @foreach($tipoAlergias as $tipoAlergia)
                    <option value="{{ $tipoAlergia->id }}">{{ $tipoAlergia->tipoalergia }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ url()->previous() }}" class="btn btn-warning">Volver</a>
    </form>
    </div>
@endsection
