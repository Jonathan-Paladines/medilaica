@extends('layouts.app')

@section('title', 'Detalles del Hábito')

@section('content')
<div class="container">
    <h1>Detalles del Hábito</h1>
    <p><strong>ID:</strong> {{ $habito->id }}</p>
    <p><strong>Hábito:</strong> {{ $habito->habitos }}</p>
    <p><strong>Fecha de Ingreso:</strong> {{ $habito->created_at->format('d-m-Y') }}</p>
    <a href="{{ route('habitos.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
