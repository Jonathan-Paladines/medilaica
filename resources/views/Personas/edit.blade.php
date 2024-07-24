@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Persona</h1>
    <form action="{{ route('personas.update', $persona->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="cedula">Cédula</label>
            <input type="text" name="cedula" id="cedula" class="form-control" value="{{ $persona->cedula }}" required>
        </div>

        <div class="form-group">
            <label for="nombres">Nombres</label>
            <input type="text" name="nombres" id="nombres" class="form-control" value="{{ $persona->nombres }}" required>
        </div>

        <div class="form-group">
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" class="form-control" value="{{ $persona->apellidos }}" required>
        </div>

        <div class="form-group">
            <label for="fnacimiento">Fecha de Nacimiento</label>
            <input type="date" name="fnacimiento" id="fnacimiento" class="form-control" value="{{ $persona->fnacimiento }}" required>
        </div>

        <div class="form-group">
            <label for="ecivil">Estado Civil</label>
            <select name="ecivil" class="form-control" id="ecivil">
                        @foreach($ecivils as $ecivil)
                            <option value="{{ $ecivil->id }}" id="ecivils" {{ $persona->ecivil_id == $ecivil->id ? 'selected' : '' }}>{{ $ecivil->estadocivil }}</option>
                        @endforeach
                    </select>
        </div>

        <div class="form-group">
            <label for="genero">Género</label>
            <select name="genero" class="form-control" id="genero">
                        @foreach($sexos as $sexo)
                            <option value="{{ $sexo->id }}" id="genero" {{ $persona->genero_id == $sexo->id ? 'selected' : '' }}>{{ $sexo->nomsexo }}</option>
                        @endforeach
                    </select>
        </div>

        <div class="form-group">
            <label for="tsangre">Tipo de Sangre</label>
            <select name="tsangre" class="form-control" id="tsangre">
                    @foreach($tiposangres as $tiposangre)
                            <option value="{{ $tiposangre->id }}" id="tsangre">{{ $tiposangre->nomtsangre }}</option>
                    @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="etnia">Etnia</label>
            <select name="etnia" class="form-control" id="etnia">
                        @foreach($etnias as $etnia)
                            <option value="{{ $etnia->id }}" {{ $persona->etnia_id == $etnia->id ? 'selected' : '' }}>{{ $etnia->nometnia }}</option>
                        @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="nacionalidad">Nacionalidad</label>
            <select name="nacionalidad" class="form-control" id="nacionalidad">
                        @foreach($paises as $pais)
                            <option value="{{ $pais->id }}" {{ $persona->paises_id == $pais->id ? 'selected' : '' }}>{{ $pais->nacionalidad }}</option>
                        @endforeach
                    </select>
        </div>

        <div class="form-group col-sm-3 mb-3">
                    <label for="telefono1">Teléfono 1</label>
                    <input type="text" class="form-control" id="telefono1" name="telefono1" value="{{ $persona->telefono1 }}" required>
                </div>
                <div class="form-group col-sm-3 mb-3">
                    <label for="telefono2">Teléfono 2</label>
                    <input type="text" class="form-control" id="telefono2" name="telefono2" value="{{ $persona->telefono2 }}" required>
                </div>
                <div class="form-group col-sm-3 mb-3">
                    <label for="correo1">Correo Institucional</label>
                    <input type="email" class="form-control" id="correo1" name="correo1" value="{{ $persona->correo1 }}" required>
                </div>
                <div class="form-group col-sm-3 mb-3">
                    <label for="correo2">Correo 2</label>
                    <input type="email" class="form-control" id="correo2" name="correo2" value="{{ $persona->correo2 }}" required>
                </div>
                <div class="form-group col-sm-3 mb-3">
                    <label for="pais_residencia">País de Residencia</label>
                    <!-- <input type="text" class="form-control" id="pais_residencia" name="pais_residencia" value="{{ old('pais_residencia', $persona->pais_residencia ?? '') }}"> -->
                    <select name="pais_residencia" class="form-control" id="pais_residencia">
                        @foreach($paises as $pais)
                            <option value="{{ $pais->id }}">{{ $pais->nompais }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-3 mb-3">
                    <label for="provincia_residencia">Provincia de Residencia</label>
                    <input type="text" class="form-control" id="provincia_residencia" name="provincia_residencia" value="{{ $persona->provincia_residencia }}" required>
                </div>
                <div class="form-group col-sm-3 mb-3">
                    <label for="ciudad_residencia">Ciudad de Residencia</label>
                    <input type="text" class="form-control" id="ciudad_residencia" name="ciudad_residencia" value="{{ $persona->ciudad_residencia }}" required>
                </div>
                <div class="form-group col-sm-8 mb-3">
                    <label for="domicilio">Domicilio</label>
                    <input type="text" class="form-control" id="domicilio" name="domicilio" value="{{ $persona->domicilio }}" required>
                </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ url('/personas') }}" type="button" class="btn btn-warning">Ir a Indice de Pacientes</a>
        <!-- <button type="#" class="btn btn-warning">Ir a Indice de Pacientes</button> -->
    </form>
</div>
@endsection
