@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Exámenes Físicos</h1>
    <a href="{{ route('examen_fisico.create') }}" class="btn btn-primary mb-3">Crear Examen Físico</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Detalle Examen Físico</th>
                <th>Observación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($examenesAgrupados as $observacion => $examenes)
                @foreach($examenes as $examen)
                    <tr>
                        <td>
                            @if ($examen->detalle && $examen->detalle->rcuerpoOef && $examen->detalle->rcuerpoOef->region)
                                {{ $examen->detalle->rcuerpoOef->region->tipo }} -
                            @endif

                            @if ($examen->detalle && $examen->detalle->rcuerpoOef && $examen->detalle->rcuerpoOef->opcionExamenFisico)
                                {{ $examen->detalle->rcuerpoOef->opcionExamenFisico->campo }}<br>
                            @endif
                        </td>
                        <td>{{ $examen->observacion }}</td>
                        <td>
                            <a href="{{ route('examen_fisico.show', $examen->id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('examen_fisico.edit', $examen->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('examen_fisico.destroy', $examen->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
@endsection
