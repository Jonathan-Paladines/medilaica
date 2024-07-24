@extends('layouts.app')

@section('title', 'Editar Datos Médicos')

@section('content')
<div class="container">
    <h1>Editar Datos Médicos</h1>
    <form action="{{ route('datos-medicos.update', $datosMedicos->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="persona_id" value="{{ $datosMedicos->persona_id }}">
        <!-- Tu formulario aquí -->
        <div class="row">
            <legend>Datos personales - Secundarios</legend>
            <div class="form-group col-sm-4 mb-3">
                <label for="vacuna">Vacuna:</label>
                <select name="vacuna" id="vacuna" class="form-control">
                    <option value="Pfizer" @if($datosMedicos->vacuna == 'Pfizer') selected @endif>Pfizer</option>
                    <option value="Astrazeneca" @if($datosMedicos->vacuna == 'Astrazeneca') selected @endif>Astrazeneca</option>
                    <option value="Sinovac" @if($datosMedicos->vacuna == 'Sinovac') selected @endif>Sinovac</option>
                    <option value="Cansino" @if($datosMedicos->vacuna == 'Cansino') selected @endif>Cansino</option>
                    <option value="Janssen" @if($datosMedicos->vacuna == 'Janssen') selected @endif>Janssen</option>
                    <option value="Moderna" @if($datosMedicos->vacuna == 'Moderna') selected @endif>Moderna</option>
                    <option value="Otro" @if($datosMedicos->vacuna == 'Otro') selected @endif>Otro</option>
                </select>
            </div>
            <div class="form-group col-sm-2 mb-3">
                <label for="numvacuna">Número de Vacuna:</label>
                <input type="number" name="numvacuna" min="0" max="6" value="{{ $datosMedicos->numvacuna }}" class="form-control">
            </div>
            <div class="form-group col-sm-12 mb-3">
                <label for="alergia">Alergia:</label>
                <input type="text" name="alergia" value="{{ $datosMedicos->alergia }}" class="form-control">
            </div>
            <div class="form-group col-sm-12 mb-3">
                <label for="antepersonales">Antecedentes personales:</label>
                <input type="text" name="antepersonales" value="{{ $datosMedicos->antepersonales }}" class="form-control">
            </div>
            <div class="form-group col-sm-12 mb-3">
                <label for="antequirurgico">Antecedentes quirurgicos:</label>
                <input type="text" name="antequirurgico" value="{{ $datosMedicos->antequirurgico }}" class="form-control">
            </div>
            <div class="form-group col-sm-12 mb-3">
                <label for="antefamiliares">Antecedentes familiares:</label>
                <input type="text" name="antefamiliares" value="{{ $datosMedicos->antefamiliares }}" class="form-control">
            </div>
            <div class="form-group col-sm-12 mb-3">
                <label for="obsficha">Observación Ficha:</label>
                <input type="text" name="obsficha" value="{{ $datosMedicos->obsficha }}" class="form-control">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('datos-medicos.index') }}" class="btn btn-warning">Cancelar</a>
    </form>
</div>
@endsection
