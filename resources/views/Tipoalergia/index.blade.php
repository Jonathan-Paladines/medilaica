@extends('layouts.app')

@section('content')
    <h1>Tipos de Alergias</h1>
    <a href="{{ route('tipoalergias.create') }}">Crear Tipo de Alergia</a>
    <ul>
        @foreach($tipoAlergias as $tipoAlergia)
            <li>{{ $tipoAlergia->tipoalergia }}
                <a href="{{ route('tipoalergias.edit', $tipoAlergia->id) }}">Editar</a>
                <form action="{{ route('tipoalergias.destroy', $tipoAlergia->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
