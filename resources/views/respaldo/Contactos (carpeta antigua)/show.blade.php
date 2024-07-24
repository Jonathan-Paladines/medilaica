@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Contacto</h1>
    <table class="table">
        <tr>
            <th><strong>ID:</strong></th>
            <td>{{ $contacto->id }}</td>
        </tr>
        <tr>
            <th><strong>Teléfono 1:</strong></th>
            <td>{{ $contacto->telefono1 }}</td>
        </tr>
        <tr>
            <th><strong>Teléfono 2:</strong></th>
            <td>{{ $contacto->telefono2 }}</td>
        </tr>
        <tr>
            <th><strong>Correo 1:</strong></th>
            <td>{{ $contacto->correo1 }}</td>
        </tr>
        <tr>
            <th><strong>Correo 2:</strong></th>
            <td>{{ $contacto->correo2 }}</td>
        </tr>
    </table>
    <!-- <p><strong>ID:</strong> {{ $contacto->id }}</p>
    <p><strong>Teléfono 1:</strong> {{ $contacto->telefono1 }}</p>
    <p><strong>Teléfono 2:</strong> {{ $contacto->telefono2 }}</p>
    <p><strong>Correo 1:</strong> {{ $contacto->correo1 }}</p>
    <p><strong>Correo 2:</strong> {{ $contacto->correo2 }}</p> -->
    <a href="{{ route('contactos.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
