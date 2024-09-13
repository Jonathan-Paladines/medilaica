@extends('layouts.app')

@section('title', 'Crear Consulta Médica')

@section('content')
<div class="container">
    <h1>Crear Consulta Médica</h1>

    <form action="{{ route('consulta_medica.store') }}" method="POST">
        @csrf
        <!-- Muestra paciente -->
        @if($persona)
            <div class="form-group col-sm-6 mb-3">
                <label for="persona_id">Paciente:</label>
                <input type="text" class="form-control" value="{{ $persona->nombres }} {{ $persona->apellidos }}" readonly>
                <input type="hidden" name="persona_id" value="{{ $persona->id }}">
            </div>
        @else
            <!-- Manejar caso cuando $persona es null -->
            <div class="form-group col-sm-6 mb-3">
                <label for="persona_id">Paciente:</label>
                <input type="text" class="form-control" value="Seleccione un paciente" readonly>
            </div>
        @endif
        
        <!-- Botón para crear un nuevo examen físico -->
        <div class="form-group col-sm-6 mb-3">
            <label for="crear_examen_fisico">Crear Examen Físico:</label>
            <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#crearExamenFisicoModal">
                Crear Examen Físico
            </button>
        </div>

        <!-- Botón para abrir el modal de revisión de examen físico -->
        <div class="form-group col-sm-6 mb-3">
            <label for="examen_fisico_id">Examen Físico:</label>
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#examenFisicoModal">
                Revisar
            </button>
            
        </div>

        <!-- Motivo de consulta -->
        <div class="form-group col-sm-6 mb-3">
            <label for="motivo_consulta">Motivo de Consulta:</label>
            <textarea name="motivo_consulta" class="form-control"></textarea>
        </div>

        <!-- Motivo de consulta -->
        <div class="form-group col-sm-6 mb-3">
            <label for="enfermedad_actual">Enfermedad actual:</label>
            <textarea name="enfermedad_actual" class="form-control"></textarea>
        </div>

        <!-- Diagnóstico -->
        <div class="form-group col-sm-6 mb-3">
            <label for="cie10_id">Diagnóstico:</label>
            <select name="cie10_id" class="form-control">
                @foreach($cie10 as $diagnostico)
                    <option value="{{ $diagnostico->id }}">{{ $diagnostico->codigo }} - {{ $diagnostico->detalle_cie }}</option>
                @endforeach
            </select>
        </div>

        <!-- Tratamiento -->
        <div class="form-group col-sm-6 mb-3">
            <label for="tratamiento">Tratamiento:</label>
            <textarea name="tratamiento" class="form-control"></textarea>
        </div>

        <!-- Observaciones -->
        <div class="form-group col-sm-6 mb-3">
            <label for="observaciones">Observaciones:</label>
            <textarea name="observaciones" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Consulta</button>
        <a href="{{ url()->previous() }}" class="btn btn-warning">Volver</a>

        <input type="hidden" name="examen_fisico_id" id="examen_fisico_id">
        
    </form>
</div>

<!-- Modal de Examen Físico -->
<div class="modal fade" id="examenFisicoModal" tabindex="-1" aria-labelledby="examenFisicoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="examenFisicoLabel">Revisar Examen Físico</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Mostrar los resultados del examen físico relacionados a la consulta médica -->
                @if($examenesAgrupados && $examenesAgrupados->isNotEmpty())
                    <ul>
                        @foreach($examenesAgrupados as $observacion => $examenes)
                            <li>
                                @foreach($examenes as $examen)
                                    <div>
                                        @if ($examen->detalle && $examen->detalle->rcuerpoOef && $examen->detalle->rcuerpoOef->region)
                                            <strong>{{ $examen->detalle->rcuerpoOef->region->tipo }}:</strong>
                                        @endif

                                        @if ($examen->detalle && $examen->detalle->rcuerpoOef && $examen->detalle->rcuerpoOef->opcionExamenFisico)
                                            {{ $examen->detalle->rcuerpoOef->opcionExamenFisico->campo }}<br>
                                        @endif

                                        {{ $examen->observacion }}<br>
                                    </div>
                                @endforeach
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>No hay exámenes físicos registrados para esta consulta médica.</p>
                @endif
            </div>
        </div>
    </div>
</div>


<!-- Modal para crear examen físico -->
<div class="modal fade" id="crearExamenFisicoModal" tabindex="-1" aria-labelledby="crearExamenFisicoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crearExamenFisicoLabel">Crear Examen Físico</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario de creación del examen físico -->
                <form id="formCrearExamenFisico" action="{{ route('examen_fisico.store', ['personaId' => $personaId]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="consulta_medica_id" value="{{ $consultaMedica->id }}">

                    <!-- Detalles del examen físico -->
                    @foreach($arrayDetalles as $detalle)
                        <div class="form-check">
                            <input type="checkbox" name="detalle_examen_fisico_id[]" value="{{ $detalle['id'] }}">
                            <label>{{ $detalle['tipo'] }} - {{ $detalle['campo'] }}</label>
                        </div>
                    @endforeach

                    <!-- Observación -->
                    <div class="mb-3">
                        <label for="observacion" class="form-label">Observación</label>
                        <textarea name="observacion" class="form-control" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Guardar Examen Físico</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')
<!-- Script para manejar la selección del examen físico -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function() {
    console.log("Script cargado correctamente"); // Añade esto para verificar que el script se carga.
    $(document).on('click', '.examen-fisico-item', function() {
        console.log("Elemento clicado:", $(this).data('id'));
        var examenId = $(this).data('id');
        $('#examen_fisico_id').val(examenId);
        $('#examenFisicoModal').modal('hide');
    });
});
</script>
@endsection
