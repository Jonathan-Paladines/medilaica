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

        <!-- Botón para abrir el modal de revisión de examen físico -->
        <div class="form-group col-sm-6 mb-3">
            <label for="examen_fisico_id">Examen Físico:</label>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#examenFisicoModal">
                Revisar
            </button>
            <input type="hidden" name="examen_fisico_id" id="examen_fisico_id">
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
    </form>
</div>

<!-- Modal de Examen Físico -->
<div class="modal fade" id="examenFisicoModal" tabindex="-1" aria-labelledby="examenFisicoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="examenFisicoLabel">Revisar Examen Físico</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Aquí muestra los resultados del examen físico -->
                <ul>
                    @foreach($examenes_fisicos as $examen)
                        <li>
                            <a href="#" class="examen-fisico-item" data-id="{{ $examen->id }}">{{ $examen->nombre }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Script para manejar la selección del examen físico -->
<script>
$(document).ready(function() {
    $(document).on('click', '.examen-fisico-item', function() {
        console.log("Elemento clicado:", $(this).data('id'));
        var examenId = $(this).data('id');
        $('#examen_fisico_id').val(examenId);
        $('#examenFisicoModal').modal('hide');
    });
});
</script>
@endsection
