@extends('layouts.app')

@section('title', 'Lista de Datos Médicos')

@section('content')
<div class="container">
    <h1>Datos Médicos</h1>
    <a href="{{ route('datosmedicos.create') }}" class="btn btn-primary">Crear Datos Médicos</a>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Persona</th>
                <th>Vacuna</th>
                <th>Número de Vacuna</th>
                <th>Alergia</th>
                <th>Antecedentes Personales</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datosMedicos as $dato)
                <tr>
                    <td>{{ $dato->id }}</td>
                    <td>{{ $dato->persona->nombre }}</td>
                    <td>{{ $dato->vacuna }}</td>
                    <td>{{ $dato->numvacuna }}</td>
                    <td>{{ $dato->alergia }}</td>
                    <td>{{ $dato->antepersonales }}</td>
                    <td>
                        <a href="{{ route('datosmedicos.show', $dato->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('datosmedicos.edit', $dato->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('datosmedicos.destroy', $dato->id) }}" method="POST" style="display:inline-block;">
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



