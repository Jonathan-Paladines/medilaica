@extends('layouts.app')

@section('title', 'Crear Persona')

@section('content')
<div class="container">
    <h1>Agregar Doctor</h1>
    <form action="{{ route('doctors.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="cedula">Cédula</label>
            <input type="text" name="cedula" class="form-control" value="{{ old('cedula') }}">
            @error('cedula')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="nombres">Nombres</label>
            <input type="text" name="nombres" class="form-control" value="{{ old('nombres') }}">
            @error('nombres')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" class="form-control" value="{{ old('apellidos') }}">
            @error('apellidos')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="genero">Género</label>
            <select name="genero" class="form-control">
                <option value="masculino" {{ old('genero') == 'masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="femenino" {{ old('genero') == 'femenino' ? 'selected' : '' }}>Femenino</option> 
                <option value="otro" {{ old('genero') == 'otro' ? 'selected' : '' }}>Otro</option> 
            </select>
            @error('genero')
                <small class="text-danger">{{ $message }}</small>
            @enderror </div> 
            <div class="form-group"> 
                <label for="correo">Correo</label> 
                <input type="email" name="correo" class="form-control" value="{{ old('correo') }}"> 
                @error('correo') 
                    <small class="text-danger">{{ $message }}</small> 
                @enderror
            </div>
            
            <div class="for
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}"> 
                @error('telefono')
                    <small class="text-danger">{{ $message }}</small> 
                @enderror
            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" name="foto" class="form-control-file">
                @error('foto')
                    <small class="text-danger">{{ $message }}</small> 
                @enderror
            </div>
            <div class="form-group">
                <label for="role_id">Rol</label>
                <select name="role_id" class="form-control">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                            {{ $role->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('role_id')
                    <small class="text-danger">{{ $message }}</small> 
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
</div>
@endsection
