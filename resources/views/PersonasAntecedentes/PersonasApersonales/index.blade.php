@extends('layouts.app')

@section('title', 'Listado de Antecedentes Personales')

@section('content')
<div class="container">
    <h1>Antecedentes Personales de {{ $persona->nombres }} {{ $persona->apellidos }}</h1>

    <!-- Botón para abrir el modal de asociación -->
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createPersonaAntecedenteModal">
        Asociar Antecedente
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
                <td>{{ $antecedente->created_at->format('d-m-Y') }}</td>
                <td>
                    <a href="{{ route('personal_antecedentes.show', $antecedente->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('personal_antecedentes.edit', $antecedente->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('personal_antecedentes.destroy', [$persona->id, $antecedente->id]) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('personas.show', $persona->id) }}" class="btn btn-warning">Volver</a>
</div>

<!-- Modal Asociar -->
<div class="modal fade" id="createPersonaAntecedenteModal" tabindex="-1" aria-labelledby="createPersonaAntecedenteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createPersonaAntecedenteModalLabel">Asociar Antecedente Personal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="associateAntecedenteForm" action="{{ route('personas_antecedentes.store', $persona->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="personal_antecedente_id" class="form-label">Seleccionar Antecedente:</label>
                        <select name="personal_antecedente_id" id="personal_antecedente_id" class="form-select" required>
                            <option value="" disabled selected>Seleccione un antecedente</option>
                            @foreach($todosLosAntecedentes as $antecedente)
                            <option value="{{ $antecedente->id }}">{{ $antecedente->anteper }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createNewAntecedenteModal">Crear Nuevo Antecedente</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" form="associateAntecedenteForm" class="btn btn-primary">Asociar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Crear Nuevo Antecedente -->
<div class="modal fade" id="createNewAntecedenteModal" tabindex="-1" aria-labelledby="createNewAntecedenteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createNewAntecedenteModalLabel">Nuevo Antecedente Personal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createNewAntecedenteForm" action="{{ route('personal_antecedentes.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="anteper" class="form-label">Descripción del Antecedente Personal:</label>
                        <textarea name="anteper" class="form-control" id="anteper" rows="5" required></textarea>
                    </div>
                    <input type="hidden" name= "paciente_id" value="{{ $persona->id }}">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" form="createNewAntecedenteForm" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.getElementById('createNewAntecedenteForm').addEventListener('submit', function(event) {
    event.preventDefault();
    let form = event.target;

    fetch(form.action, {
        method: form.method,
        body: new FormData(form),
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            let select = document.getElementById('personal_antecedente_id');
            let newOption = new Option(data.anteper, data.id, false, true);
            select.add(newOption);
            select.value = data.id;

            let modal = bootstrap.Modal.getInstance(document.getElementById('createNewAntecedenteModal'));
            modal.hide();

            // Mostrar el primer modal nuevamente
            let personaAntecedenteModal = new bootstrap.Modal(document.getElementById('createPersonaAntecedenteModal'));
            personaAntecedenteModal.show();
        } else {
            alert('Error al guardar el antecedente.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
</script>
@endsection
