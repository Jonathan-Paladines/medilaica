@extends('layouts.app')

@section('title', 'Ingresar Antecedente')

@section('content')
<div class="container">
    <form action="{{ route('personal_antecedentes.store') }}" method="POST">
        @csrf
        <div class="row">
            <legend>Ingreso de Antecedentes</legend>
            <div class="form-group col-sm-6 mb-3">
                <label for="anteper">Descripción del Antecedente:</label>
                <input type="text" name="anteper" class="form-control" id="anteper" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ url()->previous() }}" class="btn btn-warning">Volver</a>
    </form>
</div>
@endsection
