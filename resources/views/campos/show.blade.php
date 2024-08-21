@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de Campos Existentes</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Campo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $campo->campo }}</td>
            </tr>
        </tbody>
    </table>
    <a href="{{ url('/') }}" class="btn btn-primary">Volver</a>
</div>
@endsection
