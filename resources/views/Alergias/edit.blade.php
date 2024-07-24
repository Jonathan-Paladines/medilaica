@extends('layouts.app')

@section('title', 'Editar Vacuna')

@section('content')
<div class='container'>
    <h1>Editar Alergia</h1>
    <form action="{{ route('alergias.update', $alergia->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group col-sm-3 mb-3">
            <label for="nombrealergia">Nombre de Alergia:</label>
            <input type="text" name="nombrealergia" class="form-control" id="nombrealergia" value="{{ $alergia->nombrealergia }}" required>
        </div>
        <div class="form-group col-sm-3 mb-3">
            <label for="id_tipoalergias">Tipo de Alergia:</label>
            <select name="id_tipoalergias" class="form-control" id="id_tipoalergias" required>
                @foreach($tipoAlergias as $tipoAlergia)
                    <option value="{{ $tipoAlergia->id }}" @if($tipoAlergia->id == $alergia->id_tipoalergias) selected @endif>{{ $tipoAlergia->tipoalergia }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ url()->previous() }}" class="btn btn-warning">Volver</a>
    </form>
    </div>
@endsection