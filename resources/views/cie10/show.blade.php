@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de Catálogo Internacional de Enfermedades</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Código</th>
                <th>Detalle de Enfermedad</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $Cie10->codigo }}</td>
                <td>{{ $Cie10->detalle_cie }}</td>
            </tr>
        </tbody>
    </table>
    <a href="{{ url('/') }}" class="btn btn-primary">Volver</a>
</div>
@endsection
