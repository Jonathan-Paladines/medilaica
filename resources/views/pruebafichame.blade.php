@extends('layouts.app')

@section('title', 'Crear Persona')

@section('content')
    <div class="tabs">
    <div class="tab-container">
        <div id="tab3" class="tab"> 
        <a href="#tab3">Doctor/a Asignado/a</a>
        <div class="tab-content">
            <h2>Titulo 3</h2>
            <p>Lorem ipsum ...</p>
        </div>
        </div>
        <div id="tab2" class="tab">
        <a href="#tab2">Enfermería</a>
        <div class="tab-content">
            <h2>Titulo 2</h2>
            <p>Lorem ipsum ...</p>
        </div>
        </div> 
        <div id="tab1" class="tab">
            <a href="#tab1">Datos Paciente</a>
            <div class="tab-content">
                <h2>Titulo 1</h2>
                <p>Lorem ipsum ...</p>
                <div class="card">
                    <!-- "Cabecera de la tarjeta de información" -->
                    <div class="card-header">Header</div>
                    <!-- "Cabecera de la tarjeta de información" -->
                    <div class="card-body">Content
                    <h1>Detalles de la Persona</h1>
                        <table class="table">
                            <tr>
                                <th>Cédula</th>
                                <td>{{ $persona->cedula }}</td>
                            </tr>
                            <tr>
                                <th>Nombres</th>
                                <td>{{ $persona->nombres }}</td>
                            </tr>
                            <tr>
                                <th>Apellidos</th>
                                <td>{{ $persona->apellidos }}</td>
                            </tr>
                            <tr>
                                <th>Sexo</th>
                                <td>{{ $persona->sexo->nomsexo ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Etnia</th>
                                <td>{{ $persona->etnia->nometnia ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Correo Institucional</th>
                                <td>{{ $persona->correo1 }}</td>
                            </tr>
                            <tr>
                                <th>Correo Personal</th>
                                <td>{{ $persona->correo2 }}</td>
                            </tr>
                            <tr>
                                <th>Telefono #-1</th>
                                <td>{{ $persona->telefono1 }}</td>
                            </tr>
                            <tr>
                                <th>Telefono #-2</th>
                                <td>{{ $persona->telefono2 }}</td>
                            </tr>
                            <tr>
                                <th>Nacionalidad</th>
                                <td>{{ $persona->nacionalidad->nacionalidad ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>País de Residencia</th>
                                <td>{{ $persona->paisResidencia->nompais ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Provincia de Residencia</th>
                                <td>{{ $persona->provincia_residencia}}</td>
                            </tr>
                            <tr>
                                <th>Ciudad de Residencia</th>
                                <td>{{ $persona->ciudad_residencia }}</td>
                            </tr>
                            <tr>
                                <th>Domicilio</th>
                                <td>{{ $persona->domicilio }}</td>
                            </tr>
                            </td>
                        </tr>
                        
                    </table>
                    </div>
                    <!-- "Cabecera de la tarjeta de información" -->
                    <div class="card-footer">Footer</div>
                </div>
                
            </div> 
        </div> 
    </div>
    </div>
@endsection