@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de Vacuna</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre de Vacuna</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $vacuna->vacuna }}</td>
                <td>Editar | Eliminar</td>
            </tr>
        </tbody>
    </table>
    <a href="{{ url('/') }}" class="btn btn-primary">Volver</a>
</div>
@endsection

