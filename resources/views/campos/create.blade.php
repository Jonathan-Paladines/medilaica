@extends('layouts.app')

@section('title', 'Crear Exámen ')

@section('content')
<div class="container">
    <h1>Crear Campos de Examen Físico</h1>
    <form action="{{ route('campos.store') }}" method="POST">
        @csrf
        <div class="form-group col-sm-3 mb-3">
            <label for="campo">Campo:</label>
            <input type="text" class="form-control" name="campo" id="campo" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ url()->previous() }}" class="btn btn-warning">Volver</a>
    </form>
</div>
@endsection
