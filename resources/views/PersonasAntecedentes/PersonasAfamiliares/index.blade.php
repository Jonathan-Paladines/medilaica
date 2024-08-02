@extends('layouts.app')

@section('title', 'Gestión de Antecedentes Familiares')

@section('content')
<div class="container">
    <h1>Gestión de Antecedentes Familiares de {{ $persona->nombres }} {{ $persona->apellidos }}</h1>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createPersonaAfamiliarModal">
        Asociar nuevo Antecedente Familiar
    </button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Antecedente</th>
                <th>Fecha de Asociación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($persona->familiaresAntecedentes as $antecedente)
            <tr>
                <td>{{ $antecedente->id }}</td>
                <td>{{ $antecedente->antefam }}</td>
                <td>{{ $antecedente->pivot->created_at->format('d-m-Y') }}</td>
                <td>
                    <form action="{{ route('personas_afamiliares.destroy', [$persona->id, $antecedente->id]) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Desasociar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('personas.show', $persona->id) }}" class="btn btn-warning">Volver</a>
</div>

<!-- Modal Asociar -->
<div class="modal fade" id="createPersonaAfamiliarModal" tabindex="-1" aria-labelledby="createPersonaAfamiliarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createPersonaAfamiliarModalLabel">Asociar Antecedente Familiar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createPersonaAfamiliarForm" action="{{ route('personas_afamiliares.store', $persona->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="familiares_antecedente_id" class="form-label">Seleccionar Antecedente Familiar:</label>
                        <!--<input type="text" name="familiares_antecedente_id" id="familiares_antecedente_id" class="form-control" required>-->
                        <select name="familiares_antecedente_id" id="familiares_antecedente_id" class="form-control" required>
                            @foreach($antecedentes as $antecedente)
                                <option value="{{ $antecedente->id }}">{{ $antecedente->antefam }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" form="createPersonaAfamiliarForm" class="btn btn-primary">Asociar</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
