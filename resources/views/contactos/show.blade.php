@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de Vacuna</h1>
    <table class="table">
        <thead>
            <tr>
            <tr>
                <th>Nombre de Contacto</th>
                <td>{{ $persona->cedula }}</td>
            </tr>
            <tr>
                <th>Telefono de contacto</th>
                <td>{{ $persona->cedula }}</td>
            </tr>
            <tr>
                <th>Telefono secundario</th>
                <td>{{ $persona->cedula }}</td>
            </tr>
            <tr>
                <th>Parentezco</th>
                <td>{{ $persona->cedula }}</td>
            </tr>
            <tr>
                <th>Acciones</th>
                <td>{{ $persona->cedula }}</td>
            </tr>
            
        </tbody>
    </table>
    <a href="{{ url('/') }}" class="btn btn-primary">Volver</a>
</div>
@endsection

