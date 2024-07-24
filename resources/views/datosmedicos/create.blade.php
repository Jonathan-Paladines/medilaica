@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Datos Médicos</h1>
    <form action="{{ route('datosmedicos.store') }}" method="POST">
        @csrf
        <input type="hidden" name="persona_id" value="{{ $persona_id }}">
        <div class="row">
            <legend>Formulario de información del paciente</legend>
            <div class="form-group col-sm-4 mb-3">
                <label for="vacuna">Vacuna:</label>
                <select name="vacuna" id="vacuna" class="form-control">
                    <option value="Pfizer">Pfizer</option>
                    <option value="Astrazeneca">Astrazeneca</option>
                    <option value="Sinovac">Sinovac</option>
                    <option value="Cansino">Cansino</option>
                    <option value="Janssen">Janssen</option>
                </select>
            </div>
            <div class="form-group col-sm-2 mb-3">
                <label for="numvacuna">Número de Vacuna:</label>
                <input type="number" name="numvacuna" min="0" max="6" class="form-control">
            </div>
            <div class="form-group col-sm-12 mb-3">
                <label for="alergia">Alergia:</label>
                <select id="alergia" class="form-control">
                    @foreach($alergias as $alergia)
                        <option value="{{ $alergia->id }}">{{ $alergia->nomalergia }}</option>
                    @endforeach
                </select>
                <button type="button" id="addAlergia" class="btn btn-secondary mt-2">Agregar Alergia</button>
            </div>
            <div class="form-group col-sm-12 mb-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Alergia</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="alergiasTableBody">
                        <!-- Las alergias seleccionadas aparecerán aquí -->
                    </tbody>
                </table>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ url('/personas') }}" type="button" class="btn btn-warning">Ir a Indice de Pacientes</a>
    </form>
</div>

<script>
    document.getElementById('addAlergia').addEventListener('click', function() {
        var alergiaSelect = document.getElementById('alergia');
        var selectedOption = alergiaSelect.options[alergiaSelect.selectedIndex];
        var tableBody = document.getElementById('alergiasTableBody');

        var row = document.createElement('tr');
        row.innerHTML = '<td>' + selectedOption.text + '</td>' +
                        '<td><button type="button" class="btn btn-danger btn-sm removeAlergia">Eliminar</button></td>' +
                        '<input type="hidden" name="alergias[]" value="' + selectedOption.value + '">';
        tableBody.appendChild(row);
    });

    document.getElementById('alergiasTableBody').addEventListener('click', function(e) {
        if(e.target && e.target.classList.contains('removeAlergia')) {
            var row = e.target.closest('tr');
            row.remove();
        }
    });
</script>
@endsection
