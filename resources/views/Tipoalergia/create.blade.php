@extends('layouts.app')

@section('content')
    <h1>Editar Tipo de Alergia</h1>
    <form action="{{ route('tipoalergias.update', $tipoAlergia->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="tipoalergia">Tipo de Alergia:</label>
            <input type="text" name="tipoalergia" id="tipoalergia" value="{{ $tipoAlergia->tipoalergia }}" required>
        </div>
        <button type="submit">Actualizar</button>
    </form>
@endsection
