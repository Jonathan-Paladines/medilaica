@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Consultas Catálogo Internacional de Enfermedades (CIE10)</h1>
    <a href="{{ route('cie10.create') }}" class="btn btn-primary mb-3">Crear enfermedad</a>

    <!-- Campo de búsqueda con autocomplete -->
    <div class="form-group">
        <label for="search-cie10">Buscar enfermedad:</label>
        <input type="text" id="search-cie10" class="form-control" placeholder="Escribe para buscar...">
    </div>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Código</th>
                <th>Enfermedad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Cie10s as $Cie10)
            <tr>
                <td>{{ $Cie10->codigo }}</td>
                <td>{{ $Cie10->detalle_cie }}</td>
                <td>
                    <a href="{{ route('cie10.edit', $Cie10->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('cie10.destroy', $Cie10->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Aquí es donde Laravel renderiza la paginación -->
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            {{ $Cie10s->links() }}
        </ul>
    </nav>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $("#search-cie10").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "{{ route('cie10.autocomplete') }}",
                data: {
                    term: request.term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        minLength: 2,
        select: function(event, ui) {
            // Puedes redirigir a la página de detalles de la enfermedad seleccionada, si lo deseas.
            window.location.href = '/cie10/' + ui.item.id + '/edit';
        }
    });
});
</script>
@endsection

