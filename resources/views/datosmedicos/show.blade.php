@extends('layouts.app')

@section('title', 'Detalles de Datos Médicos')

@section('content')
<div class="container">
    <h1>Detalles de Datos Médicos</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $datosMedicos->id }}</td>
        </tr>
        <tr>
            <th>Persona</th>
            <td>{{ $datosMedicos->persona->nombre }}</td>
        </tr>
        <tr>
            <th>Vacuna</th>
            <td>{{ $datosMedicos->vacuna }}</td>
        </tr>
        <tr>
            <th>Número de Vacuna</th>
            <td>{{ $datosMedicos->numvacuna }}</td>
        </tr>
        <tr>
            <th>Alergia</th>
            <td>{{ $datosMedicos->alergia }}</td>
        </tr>
        <tr>
            <th>Antecedentes Personales</th>
            <td>{{ $datosMedicos->antepersonales }}</td>
        </tr>
        <tr>
            <th>Antecedentes Quirúrgicos</th>
            <td>{{ $datosMedicos->antequirurgico }}</td>
        </tr>
        <tr>
            <th>Antecedentes Familiares</th>
            <td>{{ $datosMedicos->antefamiliares }}</td>
        </tr>
        <tr>
            <th>Observaciones</th>
            <td>{{ $datosMedicos->obsficha }}</td>
        </tr>
    </table>
    <a href="{{ route('datos-medicos.index') }}" class="btn btn-primary">Volver a la lista</a>
</div>
@endsection





<!-- @extends('layouts.app')

@section('content')
<div class="container">
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
        <tr>
            <th>Acciones</th>
            <td>
                <div class="mb-2">
                    <a href="{{ route('personas.contactos.create', $persona->id) }}" class="btn btn-primary btn-circle btn-lg" name="Añadir Contactos">  
                        <i class="fa fa-address-book"></i>   
                    </a>
                </div>    
            </td>
        </tr>
       
    </table>
    <a href="{{ route('personas.index') }}" class="btn btn-primary">Volver</a>
</div>
@endsection -->

