@extends('layouts.app')

@section('title', 'Gestión de Antecedentes Quirúrgicos')

@section('content')
<div class="container">
    <h1>Gestión de Antecedentes Quirúrgicos de {{ $persona->nombres }} {{ $persona->apellidos }}</h1>
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createPersonaAntecedenteModal">
        Asociar nuevo Antecedente
    </button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Antecedente Quirúrgico</th>
                <th>Fecha de Asociación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($persona->quirurgicosAntecedentes as $antecedente)
            <tr>
                <td>{{ $antecedente->id }}</td>
                <td>{{ $antecedente->antequi }}</td>
                <td>{{ $antecedente->pivot->created_at->format('d-m-Y') }}</td>
                <td>
                    <form action="{{ route('personas_aquirurgicos.destroy', [$persona->id, $antecedente->id]) }}" method="POST" style="display:inline-block;">
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
<div class="modal fade" id="createPersonaAntecedenteModal" tabindex="-1" aria-labelledby="createPersonaAntecedenteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createPersonaAntecedenteModalLabel">Asociar Antecedente Quirúrgico</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createPersonaAntecedenteForm" action="{{ route('personas_aquirurgicos.store', $persona->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="quirurgicos_antecedente_id" class="form-label">Seleccionar Antecedente Quirúrgico:</label>
                        <div class="input-group">
                            <select name="quirurgicos_antecedente_id" id="quirurgicos_antecedente_id" class="form-control" required>
                                @foreach($antecedentes as $antecedente)
                                    <option value="{{ $antecedente->id }}">{{ $antecedente->antequi }}</option>
                                @endforeach
                            </select>
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#createNewAntecedenteModal">Nuevo</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" form="createPersonaAntecedenteForm" class="btn btn-primary">Asociar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Crear Nuevo Antecedente -->
<div class="modal fade" id="createNewAntecedenteModal" tabindex="-1" aria-labelledby="createNewAntecedenteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createNewAntecedenteModalLabel">Nuevo Antecedente Quirúrgico</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createNewAntecedenteForm" action="{{ route('quirurgicos_antecedentes.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="antequi" class="form-label">Descripción del Antecedente Quirúrgico:</label>
                        <textarea name="antequi" class="form-control" id="antequi" rows="5" required></textarea>
                    </div>
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
            let select = document.getElementById('quirurgicos_antecedente_id');
            let newOption = new Option(data.antequi, data.id, false, true);
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
