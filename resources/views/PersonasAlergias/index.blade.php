@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Personas y Alergias</h1>
    <a href="{{ route('personas_alergias.create') }}" class="btn btn-primary">Asociar Alergia a Persona</a>
    <table class="table">
        <thead>
            <tr>
                <th>Persona</th>
                <th>Alergia</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($personasAlergias as $persona)
                @foreach($persona->alergias as $alergia)
                    <tr>
                        <td>{{ $persona->nombres }} {{ $persona->apellidos }}</td>
                        <td>{{ $alergia->nombrealergia }}</td>
                        <td>
                            <form action="{{ route('personas_alergias.destroy', [$persona->id, $alergia->id]) }}" method="POST">
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
