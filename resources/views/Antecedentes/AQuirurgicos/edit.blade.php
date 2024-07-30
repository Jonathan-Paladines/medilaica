@extends('layouts.app')

@section('title', 'Editar Antecedente')

@section('content')
<div class="container">
    <form action="{{ route('personal_antecedentes.update', $antecedente->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <legend>Edición de Antecedentes</legend>
            <div class="form-group col-sm-6 mb-3">
                <label for="anteper">Descripción del Antecedente:</label>
                <input type="text" name="anteper" class="form-control" id="anteper" value="{{ $antecedente->anteper }}" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ url()->previous() }}" class="btn btn-warning">Volver</a>
    </form>
</div>
@endsection
