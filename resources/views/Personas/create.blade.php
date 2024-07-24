@extends('layouts.app')

@section('title', 'Crear Persona')

@section('content')
<div class="container">
<h1>Crear Persona</h1>
        <form action="{{ route('personas.store') }}" method="POST">
            @csrf
            <!-- Tu formulario aquí -->
            <div class="row">
                <legend>Datos personales - Básicos</legend>
                <!-- Otros campos del formulario -->

                <div class="form-group col-sm-3 mb-3">
                    <label for="cedula">Cédula:</label>
                    <input type="text" name="cedula" class="form-control" id="cedula">
                </div>
                <div class="form-group col-sm-3 mb-3">
                    <label for="nombres">Nombres:</label>
                    <input type="text" name="nombres" class="form-control" id="nombres">
                </div>
                <div class="form-group col-sm-3 mb-3">
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" name="apellidos" class="form-control" id="apellidos">
                </div>
                <div class="form-group col-sm-3 mb-3">
                    <label for="fnacimiento">Fecha de Nacimiento:</label>
                    <input type="date" name="fnacimiento" class="form-control" id="fnacimiento" required>
                </div>
                <div class="form-group col-sm-3 mb-3">
                    <label for="ecivil">Estado civil:</label>
                    <select name="ecivil" class="form-control" id="ecivil">
                        @foreach($ecivils as $ecivil)
                            <option value="{{ $ecivil->id }}" id="ecivil">{{ $ecivil->estadocivil }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-3 mb-3">
                    <label for="genero">Sexo:</label>
                    <select name="genero" class="form-control" id="genero">
                        @foreach($sexos as $sexo)
                            <option value="{{ $sexo->id }}" id="sexos">{{ $sexo->nomsexo }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-3 mb-3">
                    <label for="tsangre">Tipo de Sangre:</label>
                    <select name="tsangre" class="form-control" id="tsangre">
                        @foreach($tiposangres as $tiposangre)
                            <option value="{{ $tiposangre->id }}" id="tsangre">{{ $tiposangre->nomtsangre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-3 mb-3">
                    <label for="etnia">Etnia:</label>
                    <select name="etnia" class="form-control" id="etnia">
                        @foreach($etnias as $etnia)
                            <option value="{{ $etnia->id }}">{{ $etnia->nometnia }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-3 mb-3">
                    <label for="nacionalidad">Nacionalidad:</label>
                    <select name="nacionalidad" class="form-control" id="nacionalidad">
                        @foreach($paises as $pais)
                            <option value="{{ $pais->id }}">{{ $pais->nacionalidad }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-sm-3 mb-3">
                    <label for="telefono1">Teléfono 1</label>
                    <input type="text" class="form-control" id="telefono1" name="telefono1" value="{{ old('telefono1', $persona->telefono1 ?? '') }}">
                </div>
                <div class="form-group col-sm-3 mb-3">
                    <label for="telefono2">Teléfono 2</label>
                    <input type="text" class="form-control" id="telefono2" name="telefono2" value="{{ old('telefono2', $persona->telefono2 ?? '') }}">
                </div>
                <div class="form-group col-sm-3 mb-3">
                    <label for="correo1">Correo Institucional</label>
                    <input type="email" class="form-control" id="correo1" name="correo1" value="{{ old('correo1', $persona->correo1 ?? '') }}">
                </div>
                <div class="form-group col-sm-3 mb-3">
                    <label for="correo2">Correo 2</label>
                    <input type="email" class="form-control" id="correo2" name="correo2" value="{{ old('correo2', $persona->correo2 ?? '') }}">
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
                    <input type="text" class="form-control" id="provincia_residencia" name="provincia_residencia" value="{{ old('provincia_residencia', $persona->provincia_residencia ?? '') }}">
                </div>
                <div class="form-group col-sm-3 mb-3">
                    <label for="ciudad_residencia">Ciudad de Residencia</label>
                    <input type="text" class="form-control" id="ciudad_residencia" name="ciudad_residencia" value="{{ old('ciudad_residencia', $persona->ciudad_residencia ?? '') }}">
                </div>
                <div class="form-group col-sm-8 mb-3">
                    <label for="domicilio">Domicilio</label>
                    <input type="text" class="form-control" id="domicilio" name="domicilio" value="{{ old('domicilio', $persona->domicilio ?? '') }}">
                </div>

            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ url('/personas') }}" type="button" class="btn btn-warning">Ir a Indice de Pacientes</a>
        </form>
</div>
@endsection

