@extends('layouts.app')

@section('title', 'Editar Vacuna')

@section('content')
<div class='container'>
    <h1>Asignar Roles a {{ $user->name }}</h1>

    <form action="{{ route('user_roles.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="roles">Roles:</label>
            @foreach ($roles as $role)
                <div>
                    <input type="checkbox" name="roles[]" value="{{ $role->name }}" 
                    {{ $user->roles->contains($role->id) ? 'checked' : '' }}>
                    <label>{{ $role->name }}</label>
                </div>
            @endforeach
        </div>

        <button type="submit">Guardar</button>
    </form>
    </div>
@endsection