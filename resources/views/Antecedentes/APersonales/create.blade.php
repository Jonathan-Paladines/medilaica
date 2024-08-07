@extends('layouts.app')

@section('title', 'Crear Antecedente Personal')

@section('content')
<div class="container">
    <h1>Crear Antecedente Personal</h1>

    <form action="{{ route('personal_antecedentes.store', $persona->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="anteper" class="form-label">Antecedente Personal</label>
            <input type="text" class="form-control" id="anteper" name="anteper" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('personas_antecedentes.index', $persona->id) }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
