@extends('layouts.app')

@section('title', 'Listado de Hábitos')

@section('content')
<div class="container">
    <h1>Listado de Hábitos</h1>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createHabitoModal">
        Ingresar nuevo Hábito
    </button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre Hábito</th>
                <th>Fecha de Ingreso</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($habitos as $habito)
            <tr>
                <td>{{ $habito->id }}</td>
                <td>{{ $habito->habitos }}</td>
                <td>{{ $habito->created_at->format('d-m-Y') }}</td>
                <td>
                    <a href="{{ route('habitos.show', $habito->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('habitos.edit', $habito->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('habitos.destroy', $habito->id) }}" method="POST" style="display:inline-block;">
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

<div class="modal fade" id="createHabitoModal" tabindex="-1" aria-labelledby="createHabitoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createHabitoModalLabel">Crear Hábito</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createHabitoForm" action="{{ route('habitos.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="habitos" class="form-label">Nombre del Hábito:</label>
                        <input type="text" name="habitos" class="form-control" id="habitos" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" form="createHabitoForm" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
