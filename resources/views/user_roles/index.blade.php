@extends('layouts.app')

@section('content')
<div class="container">
<h1>Usuarios y Roles</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ implode(', ', $user->roles->pluck('name')->toArray()) }}</td>
                    <td><a href="{{ route('user_roles.edit', $user->id) }}">Editar Roles</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection