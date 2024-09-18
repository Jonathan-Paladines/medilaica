@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Rol</h1>
    <div class="card">
        <div class="card-header">
            Rol ID: {{ $role->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $role->nombre }}</h5>
            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Volver a la lista</a>
        </div>
    </div>
</div>
@endsection

