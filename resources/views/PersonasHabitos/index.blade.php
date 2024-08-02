@extends('layouts.app')

@section('title', 'Gestión de Hábitos')

@section('content')
<div class="container">
    <h1>Gestión de Hábitos de {{ $persona->nombres }} {{ $persona->apellidos }}</h1>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createPersonaHabitoModal">
        Asociar nuevo Hábito
    </button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre Hábito</th>
                <th>Fecha de Asociación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($persona->habitos as $habito)
            <tr>
                <td>{{ $habito->id }}</td>
                <td>{{ $habito->habitos }}</td>
                <td>{{ $habito->pivot->created_at->format('d-m-Y') }}</td>
                <td>
                    <form action="{{ route('personas.habitos.destroy', [$persona->id, $habito->id]) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Desasociar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ url()->previous() }}" class="btn btn-warning">Volver</a>
</div>

<!-- Modal Asociar -->
<div class="modal fade" id="createPersonaHabitoModal" tabindex="-1" aria-labelledby="createPersonaHabitoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createPersonaHabitoModalLabel">Asociar Hábito</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createPersonaHabitoForm" action="{{ route('personas.habitos.store', $persona->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="habitos_id" class="form-label">Seleccionar Hábito:</label>
                        <select name="habitos_id" id="habitos_id" class="form-control" required>
                            @foreach($habitos as $habito)
                                <option value="{{ $habito->id }}">{{ $habito->habitos }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" form="createPersonaHabitoForm" class="btn btn-primary">Asociar</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
