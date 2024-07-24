@extends('layouts.app')

@section('title', 'Crear Persona')

@section('content')
<div class="container">
        <form action="{{ route('vacunas.store') }}" method="POST">
            @csrf
            <!-- Tu formulario aquí -->
            <div class="row">
                <legend>Ingreso Vacunas</legend>
                <!-- Otros campos del formulario -->

                <div class="form-group col-sm-3 mb-3">
                    <label for="vacuna">Nombre de Vacuna:</label>
                    <input type="text" name="vacuna" class="form-control" id="vacuna">
                </div>
            </div>
            <span>Pendiente. permite guardar sin datos.</span>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ url()->previous() }}" class="btn btn-warning">Volver</a>
        </form>
</div>
@endsection

