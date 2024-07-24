@extends('layouts.app')

@section('title', 'Editar Vacuna')

@section('content')
<div class="container">
    <h1>Editar Vacuna</h1>
    <form action="{{ route('vacunas.update', $vacuna) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <legend>Editar Vacuna</legend>
            <div class="form-group col-sm-3 mb-3">
                <label for="vacuna">Nombre de Vacuna:</label>
                <input type="text" name="vacuna" class="form-control" id="vacuna" value="{{ $vacuna->vacuna }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ url()->previous() }}" class="btn btn-warning">Volver</a>
    </form>
</div>
@endsection
