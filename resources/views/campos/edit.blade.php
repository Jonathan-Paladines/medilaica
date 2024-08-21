@extends('layouts.app')

@section('title', 'Editar Campo Examen Físico')

@section('content')
<div class='container'>
    <h1>Editar Campo Examen Físico</h1>
    <form action="{{ route('campos.update', $Campo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group col-sm-3 mb-3">
            <label for="campo">Campo:</label>
            <input type="text" name="campo" class="form-control" id="campo" value="{{ $Campo->campo }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ url()->previous() }}" class="btn btn-warning">Volver</a>
    </form>
</div>
@endsection
