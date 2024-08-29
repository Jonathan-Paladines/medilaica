@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de Examen Físico</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Campo</th>
                <th>Estado</th>
                <th>Observación</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $consultaExamenFisico->campo }}</td>
                <td>{{ $consultaExamenFisico->estado }}</td>
                <td>{{ $consultaExamenFisico->observacion }}</td>
            </tr>
        </tbody>
    </table>
    <a href="{{ url('/') }}" class="btn btn-primary">Volver</a>
</div>
@endsection
