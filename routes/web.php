<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MedicinaController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\DatosAcademicosController;
use App\Http\Controllers\VacunaController;
use App\Http\Controllers\TipoAlergiaController;
use App\Http\Controllers\AlergiaController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\PersonaAlergiaController;
use App\Http\Controllers\PersonaContactosController;
use App\Http\Controllers\PersonaVacunasController;
use App\Http\Controllers\PersonalAntecedentesController;
use App\Http\Controllers\FamiliaresAntecedentesController;
use App\Http\Controllers\QuirurgicosAntecedentesController;
use App\Http\Controllers\HabitosController;
use App\Http\Controllers\PersonaHabitosController;
use App\Http\Controllers\PersonasAntecedentesController;
use App\Http\Controllers\PersonasAfamiliaresController;
use App\Http\Controllers\PersonasAquirurgicosController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/paciente-index', [PacienteController::class, 'index']);
Route::get('/paciente-create', [PacienteController::class, 'create']);

Route::get('/medicina', [MedicinaController::class, 'index']);
Route::get('/medicinacreate', [MedicinaController::class, 'create']);
Route::get('/medicina/{post}', [MedicinaController::class, 'show']);

/*
Rutas para los recursos de las tablas relacionadas personas
*/ 

#Route::resource('personas', PersonaController::class);
Route::get('/personas/create', [PersonaController::class, 'create'])->name('personas.create'); // Ruta para crear una nueva persona
Route::post('/personas', [PersonaController::class, 'store'])->name('personas.store'); // Ruta para almacenar una nueva persona
Route::get('/personas', [PersonaController::class, 'index'])->name('personas.index'); // Ruta para el índice de personas
Route::get('/personas/{id}', [PersonaController::class, 'show'])->name('personas.show'); // Ruta para mostrar una persona específica
Route::get('/personas/{id}/edit', [PersonaController::class, 'edit'])->name('personas.edit'); // Ruta para editar una persona específica
Route::put('/personas/{id}', [PersonaController::class, 'update'])->name('personas.update'); // Ruta para actualizar una persona específica
Route::delete('/personas/{id}', [PersonaController::class, 'destroy'])->name('personas.destroy'); // Ruta para eliminar una persona específica
//ruta para la relación persona-contacto
Route::resource('personas.contactos', ContactoController::class);
/*
Rutas para los recursos de las tablas relacionadas personas
*/ 
Route::resource('datos-academicos', DatosAcademicosController::class);


/*
Rutas para los recursos de las tablas relacionadas vacunas
*/
Route::resource('vacunas', VacunaController::class); // Rutas para los recursos de las tablas relacionadas vacunas.
Route::resource('tipoalergias', TipoAlergiaController::class); // Rutas para los recursos de la tabla tipoalergias.
Route::resource('alergias', AlergiaController::class); // Rutas para los recursos de las tablas relacionadas alergias.
Route::resource('contactos', ContactoController::class); // Rutas para los recursos de la tabla contactos.

//Tablas Intermedias
Route::resource('personas_alergias', PersonaAlergiaController::class)->except(['show', 'edit', 'update']);
Route::delete('/personas_alergias/{personaId}/{alergiaId}', [PersonaAlergiaController::class, 'destroy'])->name('personas_alergias.destroy');
Route::resource('personas_contactos', PersonaContactosController::class)->except(['show', 'edit', 'update']);
Route::delete('/personas_contactos/{personaId}/{contactoId}', [PersonaContactosController::class, 'destroy'])->name('personas_contactos.destroy');
Route::resource('personas_vacunas', PersonaVacunasController::class)->except(['show', 'edit', 'update']);
Route::delete('/personas_vacunas/{personaId}/{vacunaId}', [PersonaVacunasController::class, 'destroy'])->name('personas_vacunas.destroy');

Route::get('personas_contactos/{persona_id?}', [PersonaContactosController::class, 'index'])->name('personas_contactos.index');
Route::post('personas_contactos', [PersonaContactosController::class, 'store'])->name('personas_contactos.store');
Route::delete('personas_contactos/{persona_id}/{contacto_id}', [PersonaContactosController::class, 'destroy'])->name('personas_contactos.destroy');

//Antecedentes Personales
Route::resource('personal_antecedentes', PersonalAntecedentesController::class);
//Route::post('personas/{persona}/personal_antecedentes', [PersonasAntecedentesController::class, 'store'])->name('personal_antecedentes.store');
//Route::get('personas/{persona}/personal_antecedentes', [PersonasAntecedentesController::class, 'index'])->name('personas_antecedentes.index');
//Route::get('personas/{persona}/personal_antecedentes/create', [PersonasAntecedentesController::class, 'create'])->name('personal_antecedentes.create');


Route::resource('familiares_antecedentes', FamiliaresAntecedentesController::class);
Route::resource('quirurgicos_antecedentes', QuirurgicosAntecedentesController::class);
Route::resource('habitos', HabitosController::class);

// Tabla intermedia PersonaHábitos
Route::get('personas/{persona}/habitos', [PersonaHabitosController::class, 'index'])->name('personas.habitos.index');
Route::post('personas/{persona}/habitos', [PersonaHabitosController::class, 'store'])->name('personas.habitos.store');
Route::delete('personas/{persona}/habitos/{habitos}', [PersonaHabitosController::class, 'destroy'])->name('personas.habitos.destroy');

// Tabla intermedia PersonasAntecedentes
Route::prefix('personas/{persona}')->group(function () {
    Route::get('antecedentes', [PersonasAntecedentesController::class, 'index'])->name('personas_antecedentes.index');
    Route::post('antecedentes', [PersonasAntecedentesController::class, 'store'])->name('personas_antecedentes.store');
    Route::delete('antecedentes/{personal_antecedente}', [PersonasAntecedentesController::class, 'destroy'])->name('personas_antecedentes.destroy');
});

// Ruta T-intermedia relacion personas y antec.Familiares
// Ruta para mostrar los antecedentes familiares de una persona
Route::get('personas/{persona}/afamiliares', [PersonasAfamiliaresController::class, 'index'])->name('personas_afamiliares.index');

// Ruta para asociar un nuevo antecedente familiar a una persona
Route::post('personas/{persona}/afamiliares', [PersonasAfamiliaresController::class, 'store'])->name('personas_afamiliares.store');

// Ruta para desasociar un antecedente familiar de una persona
Route::delete('personas/{persona}/afamiliares/{antecedente}', [PersonasAfamiliaresController::class, 'destroy'])->name('personas_afamiliares.destroy');


// Ruta para mostrar los antecedentes quirurgicos de una persona
Route::get('personas/{personaId}/antecedentes-quirurgicos', [PersonasAquirurgicosController::class, 'index'])->name('personas_aquirurgicos.index');
Route::post('personas/{persona}/quirurgicos', [PersonasAquirurgicosController::class, 'store'])->name('personas_aquirurgicos.store');
Route::delete('personas/{persona}/quirurgicos/{antecedente}', [PersonasAquirurgicosController::class, 'destroy'])->name('personas_aquirurgicos.destroy');
Route::post('quirurgicos-antecedentes', [QuirurgicosAntecedentesController::class, 'store'])->name('quirurgicos_antecedentes.store');
//Route::resource('personas_aquirurgicos', PersonasAquirurgicosController::class);
//Route::get('personas_aquirurgicos/{personaId}', [PersonasAquirurgicosController::class, 'index'])->name('personas_aquirurgicos.index');




