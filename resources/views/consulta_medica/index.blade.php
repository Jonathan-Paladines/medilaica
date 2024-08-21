@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Consultas Médicas</h1>
    <a href="{{ route('consulta_medica.create') }}" class="btn btn-primary">Crear Consulta Médica</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Motivo de Consulta</th>
                <th>Enfermedad Actual</th>
                <th>Tratamiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($consultas as $consulta)
            <tr>
                <td>{{ $consulta->motivo_de_consulta }}</td>
                <td>{{ $consulta->enfermedad_actual }}</td>
                <td>{{ $consulta->tratamiento }}</td>
                <td>
                    <a href="{{ route('consulta_medica.edit', $consulta->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('consulta_medica.destroy', $consulta->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>    
            @endforeach
        </tbody>
    </table>
</div>
@endsection
