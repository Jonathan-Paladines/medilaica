@extends('layouts.app')

@section('title', 'Listado de Antecedentes')

@section('content')
<div class="container">
<h1>Antecedentes Personales de {{ $persona->nombre }}</h1>

    <!-- Botón para abrir el modal -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createAntecedenteModal">
        Crear Antecedente
    </button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descripción</th>
                <th>Fecha de Ingreso</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($antecedentes as $antecedente)
            <tr>
                <td>{{ $antecedente->id }}</td>
                <td>{{ $antecedente->anteper }}</td>
                <td>{{ $antecedente->created_at->format('d-m-Y') }}</td> <!-- Formatear la fecha como desees -->
                <td>
                    <a href="{{ route('personal_antecedentes.show', $antecedente->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('personal_antecedentes.edit', $antecedente->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('personal_antecedentes.destroy', $antecedente->id) }}" method="POST" style="display:inline-block;">
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

<!-- Modal -->
<div class="modal fade" id="createAntecedenteModal" tabindex="-1" aria-labelledby="createAntecedenteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createAntecedenteModalLabel">Crear Antecedente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createAntecedenteForm" action="{{ route('personal_antecedentes.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="anteper" class="form-label">Descripción del Antecedente:</label>
                        <textarea name="anteper" class="form-control" id="anteper" rows="5" required></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" form="createAntecedenteForm" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
