@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Vacunas</h1>
    <a href="{{ route('vacunas.create') }}" class="btn btn-primary">Ingresar Vacuna</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>No.</th>
                <th>Vacuna</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vacunas as $vacuna)
            <tr>
                <td>{{ $vacuna->id }}</td>
                <td>{{ $vacuna->vacuna }}</td>
                <td>
                    <a href="{{ route('vacunas.edit', $vacuna) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('vacunas.destroy', $vacuna) }}" method="POST" style="display:inline-block;">
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
