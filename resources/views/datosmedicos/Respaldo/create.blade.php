@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Datos Médicos</h1>
    <form action="{{ route('datosmedicos.store') }}" method="POST">
        @csrf
        <input type="hidden" name="persona_id" value="{{ $persona_id }}">
        <!-- Tu formulario aquí -->
        <div class="row">
            <legend>Formulario de información del paciente</legend>
            <div class="form-group col-sm-4 mb-3">
                <label for="vacuna">Vacuna:</label>
                <select name="vacuna" id="vacuna" class="form-control">
                    <option value="Pfizer">Pfizer</option>
                    <option value="Astrazeneca">Astrazeneca</option>
                    <option value="Sinovac">Sinovac</option>
                    <option value="Cansino">Cansino</option>
                    <option value="Janssen">Janssen</option>
                </select>
            </div>
            <div class="form-group col-sm-2 mb-3">
                <label for="numvacuna">Número de Vacuna:</label>
                <input type="number" name="numvacuna" min="0" max="6" class="form-control">
            </div>
            <div class="form-group col-sm-12 mb-3">
                <label for="alergia">Alergia:</label>
                <input type="text" name="alergia" class="form-control">
            </div>
            <div class="form-group col-sm-12 mb-3">
                <label for="antepersonales">Antecedentes personales:</label>
                <input type="text" name="antepersonales" class="form-control">
            </div>
            <div class="form-group col-sm-12 mb-3">
                <label for="antequirurgico">Antecedentes quirurgicos:</label>
                <input type="text" name="antequirurgico" class="form-control">
            </div>
            <div class="form-group col-sm-12 mb-3">
                <label for="antefamiliares">Antecedentes familiares:</label>
                <input type="text" name="antefamiliares" class="form-control">
            </div>
            <div class="form-group col-sm-12 mb-3">
                <label for="obsficha">Observación Ficha:</label>
                <input type="text" name="obsficha" class="form-control">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ url('/personas') }}" type="button" class="btn btn-warning">Ir a Indice de Pacientes</a>
    </form>
</div>
@endsection
