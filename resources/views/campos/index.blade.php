@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Campos Existentes</h1>
    <a href="{{ route('campos.create') }}" class="btn btn-primary">Crear Campo</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Campo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($campos as $campo)
            <tr>
                <td>{{ $campo->campo }}</td>

                <td>
                    <a href="{{ route('campos.edit', $campo->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('campos.destroy', $campo->id) }}" method="POST" style="display:inline-block;">
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
