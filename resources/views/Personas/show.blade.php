@extends('layouts.app')

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
                <div class="button container">
                    <div class="btn-wrapper mb-3" >
                        <a href="#" class="btn btn-primary btn-circle btn-lg" name="Añadir Receta" title="Añadir Receta">  
                            <i class="fa fa-prescription"></i>   
                        </a>
                        <a href="#" class="btn btn-primary btn-circle btn-lg" name="Añadir_anamnesis" title="Anamnesis">  
                            <i class="fa fa-notes-medical"></i>   
                        </a>
                        <a href="#" class="btn btn-primary btn-circle btn-lg" name="Añadir_atención_odontologica" title="Odontología">  
                            <i class="fa fa-tooth"></i>   
                        </a>
                        <a href="#" class="btn btn-primary btn-circle btn-lg" name="Añadir_signos_vitales" title="Signos vitales">  
                            <i class="fa fa-user-nurse"></i>   
                        </a>
                        <a href="#" class="btn btn-primary btn-circle btn-lg" name="Despachar_medicamento" title="Farmacia">  
                            <i class="fa fa-tablets"></i>   
                        </a>
                    </div>
                    <div class="btn-wrapper mb-3">
                        <a href="{{ route('personas_alergias.create') }}" class="btn btn-info btn-circle btn-lg" name="ver_alergias" title="Alergias">  
                            <i class="fa fa-flask"></i>   
                        </a>
                        <a href="{{ route('personas_vacunas.create') }}" class="btn btn-info btn-circle btn-lg" name="ver_vacunas" title="Vacunas">  
                            <i class="fa fa-syringe"></i>   
                        </a>
                        <a href="{{ route('personas_contactos.create', $persona->id) }}" class="btn btn-info btn-circle btn-lg" name="ver_contactos" title="Contactos de emergencia">  
                            <i class="fa fa-address-book"></i>   
                        </a>
                        <a href="{{ route('personas.habitos.index', $persona->id) }}" class="btn btn-info btn-circle btn-lg" name="ver_habitos" title="Hábitos">
                            <i class="fa fa-bath"></i>
                        </a>
                    </div>
                    <div class="btn-wrapper mb-3">
                        <a href="{{ route('personas_antecedentes.index', $persona->id) }}" class="btn btn-success btn-circle btn-lg" name="ver_antecedentes personales" title="Antecedentes Personales">  
                            <i class="fa fa-heart"></i>   
                        </a>
                        <a href="{{ route('personas_aquirurgicos.index', $persona->id) }}" class="btn btn-success btn-circle btn-lg" name="Ver antecedentes quirurgicos" title="Antecedentes Quirúrgicos">  
                            <i class="fa fa-history"></i>                               
                        </a>
                        <a href="{{ route('personas_afamiliares.index', $persona->id) }}" class="btn btn-success btn-circle btn-lg" name="ver_Antecdentes familiares" title="Antecedentes Familiares">  
                            <i class="fa fa-heartbeat"></i>   
                        </a>
                    </div>
                    
                </div> 
            </td>
        </tr>
        
    </table>
    <a href="{{ route('personas.index') }}" class="btn btn-primary">Volver</a>
</div>
@endsection

