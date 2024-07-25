<!-- resources/views/personas_contactos/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Relaciones entre Personas y Vacunas</h1>
    <a href="{{ route('personas_vacunas.create') }}" class="btn btn-primary mb-3">Agregar Relación</a>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Persona</th>
                <th>Vacuna</th>
                <th>Dosis</th>
                <th>Fecha de Vacuna</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($personasVacunas as $persona)
                @foreach($persona->Vacunas as $vacuna)
                    <tr>
                        <td>{{ $persona->nombres }} {{ $persona->apellidos }}</td>
                        <td>{{ $vacuna->vacuna }}</td>
                        <td>{{ $vacuna->pivot->numero_dosis }}</td>
                        <td>{{ $vacuna->pivot->fecha_vacuna }}</td>
                        <td>
                            <form action="{{ route('personas_vacunas.destroy', [$persona->id, $vacuna->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Desasociar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
@endsection
