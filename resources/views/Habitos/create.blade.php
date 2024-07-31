@extends('layouts.app')

@section('title', 'Crear Hábito')

@section('content')
<div class="container">
    <h1>Ingresar Hábito</h1>
    <form action="{{ route('habitos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción del Hábito:</label>
            <input type="text" name="descripcion" class="form-control" id="descripcion" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
