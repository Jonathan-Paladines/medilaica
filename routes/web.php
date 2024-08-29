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
use App\Http\Controllers\RegionesDelCuerpoController;
use App\Http\Controllers\OpcionesExamenFisicoController;
use App\Http\Controllers\RcuerpoOefController;
use App\Http\Controllers\DetalleExamenFisicoController;
use App\Http\Controllers\ExamenFisicoController;
use App\Http\Controllers\Cie10Controller;
use App\Http\Controllers\ConsultaMedicaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/magician', function () {
    return view('halo');
});

Route::get('/cmp', function () {
    return view('consultamed');
});

// Rutas para Paciente
Route::get('/paciente-index', [PacienteController::class, 'index']);
Route::get('/paciente-create', [PacienteController::class, 'create']);

// Rutas para Medicina
Route::get('/medicina', [MedicinaController::class, 'index']);
Route::get('/medicinacreate', [MedicinaController::class, 'create']);
Route::get('/medicina/{post}', [MedicinaController::class, 'show']);

/*
Rutas para los recursos de las tablas relacionadas personas
*/ 
Route::get('/personas/create', [PersonaController::class, 'create'])->name('personas.create');
Route::post('/personas', [PersonaController::class, 'store'])->name('personas.store');
Route::get('/personas', [PersonaController::class, 'index'])->name('personas.index');
Route::get('/personas/{id}', [PersonaController::class, 'show'])->name('personas.show');
Route::get('/personas/{id}/edit', [PersonaController::class, 'edit'])->name('personas.edit');
Route::put('/personas/{id}', [PersonaController::class, 'update'])->name('personas.update');
Route::delete('/personas/{id}', [PersonaController::class, 'destroy'])->name('personas.destroy');

// Ruta para la relación persona-contacto
Route::resource('personas.contactos', ContactoController::class);

/*
Rutas para los recursos de las tablas relacionadas personas
*/ 
Route::resource('datos-academicos', DatosAcademicosController::class);

/*
Rutas para los recursos de las tablas relacionadas vacunas
*/
Route::resource('vacunas', VacunaController::class);
Route::resource('tipoalergias', TipoAlergiaController::class);
Route::resource('alergias', AlergiaController::class);
Route::resource('contactos', ContactoController::class);

// Tablas Intermedias
Route::resource('personas_alergias', PersonaAlergiaController::class)->except(['show', 'edit', 'update']);
Route::delete('/personas_alergias/{personaId}/{alergiaId}', [PersonaAlergiaController::class, 'destroy'])->name('personas_alergias.destroy');
Route::resource('personas_contactos', PersonaContactosController::class)->except(['show', 'edit', 'update']);
Route::delete('/personas_contactos/{personaId}/{contactoId}', [PersonaContactosController::class, 'destroy'])->name('personas_contactos.destroy');
Route::resource('personas_vacunas', PersonaVacunasController::class)->except(['show', 'edit', 'update']);
Route::delete('/personas_vacunas/{personaId}/{vacunaId}', [PersonaVacunasController::class, 'destroy'])->name('personas_vacunas.destroy');

// Antecedentes Personales (PersonalAntecedentesController)
Route::post('personal_antecedentes', [PersonalAntecedentesController::class, 'store'])->name('personal_antecedentes.store');

// Antecedentes Personales (FamiliarAntecedentesController)
Route::post('familiares_antecedentes', [FamiliaresAntecedentesController::class, 'store'])->name('familiares_antecedentes.index');

// Tabla intermedia PersonasAntecedentes
Route::get('personas/{persona}/antecedentes-personas', [PersonasAntecedentesController::class, 'index'])->name('personas_antecedentes.index');
//Route::post('personas/{persona}/antecedentes', [PersonasAntecedentesController::class, 'store'])->name('personas_antecedentes.store');
//Route::post('personas/{persona_id}/personal_antecedentes', [PersonasAntecedentesController::class, 'store'])->name('personal_antecedentes.store');
Route::post('personas/{persona}/antecedentes', [PersonasAntecedentesController::class, 'store'])->name('personas_antecedentes.store');
Route::delete('personas/{persona}/antecedentes/{antecedente}', [PersonasAntecedentesController::class, 'destroy'])->name('personas_antecedentes.destroy');


// Antecedentes Familiares (FamiliaresAntecedentesController)
Route::resource('familiares_antecedentes', FamiliaresAntecedentesController::class);
Route::resource('quirurgicos_antecedentes', QuirurgicosAntecedentesController::class);
Route::resource('habitos', HabitosController::class);

// Tabla intermedia PersonaHábitos
Route::get('personas/{persona}/habitos', [PersonaHabitosController::class, 'index'])->name('personas.habitos.index');
Route::post('personas/{persona}/habitos', [PersonaHabitosController::class, 'store'])->name('personas.habitos.store');
Route::delete('personas/{persona}/habitos/{habitos}', [PersonaHabitosController::class, 'destroy'])->name('personas.habitos.destroy');

// Ruta T-intermedia relacion personas y antec.Familiares
// Ruta para mostrar los antecedentes familiares de una persona
Route::get('personas/{persona}/afamiliares', [PersonasAfamiliaresController::class, 'index'])->name('personas_afamiliares.index');

// Ruta para asociar un nuevo antecedente familiar a una persona
Route::post('personas/{persona}/afamiliares', [PersonasAfamiliaresController::class, 'store'])->name('personas_afamiliares.store');

// Ruta para desasociar un antecedente familiar de una persona
Route::delete('personas/{persona}/afamiliares/{antecedente}', [PersonasAfamiliaresController::class, 'destroy'])->name('personas_afamiliares.destroy');

// Ruta para mostrar los antecedentes quirúrgicos de una persona
Route::get('personas/{personaId}/antecedentes-quirurgicos', [PersonasAquirurgicosController::class, 'index'])->name('personas_aquirurgicos.index');
Route::post('personas/{persona}/quirurgicos', [PersonasAquirurgicosController::class, 'store'])->name('personas_aquirurgicos.store');
Route::delete('personas/{persona}/quirurgicos/{antecedente}', [PersonasAquirurgicosController::class, 'destroy'])->name('personas_aquirurgicos.destroy');
Route::post('quirurgicos-antecedentes', [QuirurgicosAntecedentesController::class, 'store'])->name('quirurgicos_antecedentes.store');


// Rutas para mostrar los exámenes físicos de una persona
Route::resource('regiones_cuerpo', RegionesDelCuerpoController::class);
Route::resource('opciones_examen_fisico', OpcionesExamenFisicoController::class);
Route::resource('rcuerpo_oef', RcuerpoOefController::class);
Route::resource('detalle_examen_fisico', DetalleExamenFisicoController::class);
Route::resource('examen_fisico', ExamenFisicoController::class);
Route::resource('cie10', Cie10Controller::class);
Route::resource('consulta-medica', ConsultaMedicaController::class);