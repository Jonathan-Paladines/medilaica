<!-- resources/views/personas_contactos/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Asociar Persona con Vacuna</h1>
    <form action="{{ route('personas_vacunas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="persona_id" class="form-label">Persona</label>
            <select name="persona_id" id="persona_id" class="form-control" required>
                <option value="" disabled selected>Seleccione una persona</option>
                @foreach($personas as $persona)
                    <option value="{{ $persona->id }}">{{ $persona->nombres }} {{ $persona->apellidos }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="vacuna_id" class="form-label">Vacuna</label>
            <div class="d-flex align-items-center">
            <select name="vacuna_id" id="vacuna_id" class="form-control" required>
                <option value="" disabled selected>Seleccione una vacuna</option>
                @foreach($vacunas as $vacuna)
                    <option value="{{ $vacuna->id }}">{{ $vacuna->vacuna }}</option>
                @endforeach
            </select>
            <a href="{{ route('vacunas.create') }}" class="btn btn-info btn-circle btn-sm ms-3" name="ingresar_vacunas" title="Ingresar Vacunas">  
                            <i class="fa fa-address-book"></i>   
                    </a>
                    </div>
        </div>
        <div class="form-group col-sm-3 mb-3">
            <label for="numero_dosis">Número de Dosis:</label>
            <input type="number" name="numero_dosis" class="form-control" id="numero_dosis">
        </div>
        <div class="form-group col-sm-3 mb-3">
                <label for="fecha_vacuna">Fecha de Vacuna:</label>
                <input type="date" name="fecha_vacuna" class="form-control" id="fecha_vacuna" required>
        </div>

        <button type="submit" class="btn btn-primary">Asociar</button>
        <a href="{{ route('personas_vacunas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
