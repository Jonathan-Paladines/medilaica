@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Doctor</h1>

    <div class="card">
        <div class="card-header">
            Información del Doctor
        </div>
        <div class="card-body">
            <p><strong>Cédula:</strong> {{ $doctor->cedula }}</p>
            <p><strong>Nombres:</strong> {{ $doctor->nombres }}</p>
            <p><strong>Apellidos:</strong> {{ $doctor->apellidos }}</p>
            <p><strong>Género:</strong> {{ ucfirst($doctor->genero) }}</p>
            <p><strong>Correo:</strong> {{ $doctor->correo }}</p>
            <p><strong>Teléfono:</strong> {{ $doctor->telefono }}</p>
            <p><strong>Rol:</strong> {{ $doctor->role->nombre }}</p>
            <p><strong>Foto:</strong></p>
            @if($doctor->foto)
                <img src="{{ asset('storage/'.$doctor->foto) }}" alt="Foto del doctor {{ $doctor->nombres }}" width="100">
            @else
                <p>Sin foto disponible</p>
            @endif
        </div>
    </div>

    <a href="{{ route('doctors.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
</div>
@endsection

