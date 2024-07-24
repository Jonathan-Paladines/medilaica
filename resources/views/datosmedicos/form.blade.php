<div class="form-group">
    <label for="cedula">Cédula:</label>
    <input type="text" name="cedula" class="form-control" value="{{ old('cedula', $persona->cedula ?? '') }}">
</div>
<div class="form-group">
    <label for="nombres">Nombres:</label>
    <input type="text" name="nombres" class="form-control" value="{{ old('nombres', $persona->nombres ?? '') }}">
</div>
<div class="form-group">
    <label for="apellidos">Apellidos:</label>
    <input type="text" name="apellidos" class="form-control" value="{{ old('apellidos', $persona->apellidos ?? '') }}">
</div>
<div class="form-group col-sm-3 mb-3">
            <label for="fnacimiento">Fecha de Nacimiento:</label>
            <input type="date" name="fnacimiento" class="form-control" value="{{ old('fnacimiento', $persona->fnacimiento ?? '') }}">
        </div>
        <div class="form-group col-sm-3 mb-3">
            <label for="ecivil">Estado civil:</label>
            <select name="ecivil" id="ecivil" class="form-control">
                <option value="ec1" {{ old('ecivil', $persona->ecivil ?? '') == 'ec1' ? 'selected' : '' }}>Soltero</option>
                <option value="ec2" {{ old('ecivil', $persona->ecivil ?? '') == 'ec2' ? 'selected' : '' }}>Casado</option>
                <option value="ec3" {{ old('ecivil', $persona->ecivil ?? '') == 'ec3' ? 'selected' : '' }}>Viudo</option>
                <option value="ec4" {{ old('ecivil', $persona->ecivil ?? '') == 'ec4' ? 'selected' : '' }}>Divorciado</option>
                <option value="ec5" {{ old('ecivil', $persona->ecivil ?? '') == 'ec5' ? 'selected' : '' }}>Unión Libre</option>
            </select>
        </div>
        <div class="form-group col-sm-3 mb-3">
            <label for="genero">Sexo:</label>
            <input type="text" name="genero" class="form-control" value="{{ old('genero', $persona->genero ?? '') }}">
        </div>
        <div class="form-group col-sm-3 mb-3">
            <label for="tsangr">Tipo de Sangre:</label>
            <select name="tsangre" id="tsangre" class="form-control">
                <option value="s1" {{ old('tsangre', $persona->tsangre ?? '') == 's1' ? 'selected' : '' }}>A(+)</option>
                <option value="s2" {{ old('tsangre', $persona->tsangre ?? '') == 's2' ? 'selected' : '' }}>A(-)</option>
                <option value="s3" {{ old('tsangre', $persona->tsangre ?? '') == 's3' ? 'selected' : '' }}>O(+)</option>
                <option value="s4" {{ old('tsangre', $persona->tsangre ?? '') == 's4' ? 'selected' : '' }}>O(-)</option>
                <option value="s5" {{ old('tsangre', $persona->tsangre ?? '') == 's5' ? 'selected' : '' }}>AB(+)</option>
                <option value="s6" {{ old('tsangre', $persona->tsangre ?? '') == 's6' ? 'selected' : '' }}>AB(-)</option>
                <option value="s7" {{ old('tsangre', $persona->tsangre ?? '') == 's7' ? 'selected' : '' }}>B(+)</option>
                <option value="s8" {{ old('tsangre', $persona->tsangre ?? '') == 's8' ? 'selected' : '' }}>B(-)</option>
                <option value="s9" {{ old('tsangre', $persona->tsangre ?? '') == 's9' ? 'selected' : '' }}>N/S</option>
            </select>
        </div>
        <div class="form-group col-sm-3 mb-3">
            <label for="etnia">Etnia:</label>
            <input type="text" name="etnia" class="form-control" value="{{ old('etnia', $persona->etnia ?? '') }}">
        </div>
        <div class="form-group col-sm-3 mb-3">
            <label for="nacionalidad">Nacionalidad:</label>
            <input type="text" name="nacionalidad" class="form-control" value="{{ old('nacionalidad', $persona->nacionalidad ?? '') }}">
        </div>
<!-- Agrega más campos según sea necesario -->
