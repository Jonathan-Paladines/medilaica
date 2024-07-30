@extends('layouts.app')

@section('title', 'Detalle del Antecedente')

@section('content')
<div class="container">
    <h1>Detalle del Antecedente</h1>
    <div class="form-group">
        <label for="id">ID:</label>
        <p>{{ $antecedente->id }}</p>
    </div>
    <div class="form-group">
        <label for="anteper">Descripción del Antecedente:</label>
        <p>{{ $antecedente->anteper }}</p>
    </div>
    <a href="{{ url()->previous() }}" class="btn btn-warning">Volver</a>
</div>
@endsection
