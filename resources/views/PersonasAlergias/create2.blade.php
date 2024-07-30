@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Asociar Alergia a Persona</h1>
    <form action="{{ route('personas_alergias.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="persona_id">Persona</label>
            <select name="persona_id" id="persona_id" class="form-control" required>
                @foreach($personas as $persona)
                    <option value="{{ $persona->id }}">{{ $persona->nombres }} {{ $persona->apellidos }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="alergia_id">Alergia</label>
            <div class="d-flex align-items-center">
            <select name="alergia_id" id="alergia_id" class="form-control" required>
                @foreach($alergias as $alergia)
                    <option value="{{ $alergia->id }}">{{ $alergia->nombrealergia }}</option>
                @endforeach
            </select>
            <a href="{{ route('contactos.create') }}" class="btn btn-info btn-circle btn-sm ms-3" name="ingresar_alergia" title="Ingresar Alergia">  
                <i class="fa fa-flask"></i>   
            </a>
        </div>
        </div>
        <button type="submit" class="btn btn-primary">Asociar</button>
    </form>
</div>
@endsection
