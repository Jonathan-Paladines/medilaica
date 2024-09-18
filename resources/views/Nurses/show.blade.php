@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de la Enfermera</h1>
    <div class="card">
        <div class="card-header">
            {{ $nurse->nombres }} {{ $nurse->apellidos }}
        </div>
        <div class="card-body">
            <p><strong>Cédula:</strong> {{ $nurse->cedula }}</p>
            <p><strong>Correo:</strong> {{ $nurse->correo }}</p>
            <p><strong>Teléfono:</strong> {{ $nurse->telefono }}</p>
            @if($nurse->foto)
            <p><strong>Foto:</strong></p>
            <img src="{{ asset('storage/'.$nurse->foto) }}" alt="Foto de {{ $nurse->nombres }}" width="150">
            @endif
            <a href="{{ route('nurses.edit', $nurse->id) }}" class="btn btn-warning mt-3">Editar</a>
            <a href="{{ route('nurses.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
        </div>
    </div>
</div>
@endsection

