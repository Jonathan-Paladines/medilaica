@extends('layouts.app')

@section('title', 'Editar Vacuna')

@section('content')
<div class="container">
    <h1>Editar Doctor</h1>

    <form action="{{ route('doctors.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="cedula">Cédula</label>
            <input type="text" name="cedula" class="form-control" value="{{ old('cedula', $doctor->cedula) }}">
            @error('cedula')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="nombres">Nombres</label>
            <input type="text" name="nombres" class="form-control" value="{{ old('nombres', $doctor->nombres) }}">
            @error('nombres')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" class="form-control" value="{{ old('apellidos', $doctor->apellidos) }}">
            @error('apellidos')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="genero">Género</label>
            <select name="genero" class="form-control">
                <option value="masculino" {{ old('genero', $doctor->genero) == 'masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="femenino" {{ old('genero', $doctor->genero) == 'femenino' ? 'selected' : '' }}>Femenino</option>
                <option value="otro" {{ old('genero', $doctor->genero) == 'otro' ? 'selected' : '' }}>Otro</option>
            </select>
            @error('genero')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="correo">Correo</label>
            <input type="email" name="correo" class="form-control" value="{{ old('correo', $doctor->correo) }}">
            @error('correo')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $doctor->telefono) }}">
            @error('telefono')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="foto">Foto</label>
            @if ($doctor->foto)
                <div class="mb-2">
                    <img src="{{ asset('storage/'.$doctor->foto) }}" alt="Foto del doctor {{ $doctor->nombres }}" width="100">
                </div>
            @endif
            <input type="file" name="foto" class="form-control-file">
            @error('foto')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="role_id">Rol</label>
            <select name="role_id" class="form-control">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ old('role_id', $doctor->role_id) == $role->id ? 'selected' : '' }}>
                        {{ $role->nombre }}
                    </option>
                @endforeach
            </select>
            @error('role_id')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection