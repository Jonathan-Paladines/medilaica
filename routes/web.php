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
Route::resource('personas_contactos', PersonaContactosController::class)->except(['show', 'edit', 'update']);
Route::resource('personas_vacunas', PersonaVacunasController::class)->except(['show', 'edit', 'update']);