@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de Consulta Médica</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Motivo de Consulta</th>
                <th>Enfermedad Actual</th>
                <th>Tratamiento</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $consultaMedica->motivo_de_consulta }}</td>
                <td>{{ $consultaMedica->Enfermedad_actual }}</td>
                <td>{{ $consultaMedica->Tratamiento }}</td>
            </tr>
        </tbody>
    </table>
    <a href="{{ url('/') }}" class="btn btn-primary">Volver</a>
</div>
@endsection
