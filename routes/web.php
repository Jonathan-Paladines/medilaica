
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
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
use App\Http\Controllers\RoleController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\UserRoleController;
use Spatie\Permission\Http\Middleware\RoleMiddleware;

// Redirigir la ruta raíz a la pantalla de login
Route::get('/', function () {
    return redirect()->route('login'); // Redirige a la ruta del login
});

// Solo los usuarios con el rol de Admin pueden acceder a estas rutas
Route::middleware(['role:Admin'])->group(function () {
    // Rutas para gestionar roles y permisos de usuarios
    Route::get('user_roles', [UserRoleController::class, 'index'])->name('user_roles.index');
    Route::get('user_roles/{id}/edit', [UserRoleController::class, 'edit'])->name('user_roles.edit');
    Route::put('user_roles/{id}', [UserRoleController::class, 'update'])->name('user_roles.update');

    // Rutas para asignar roles
    Route::get('/roles/assign', [RoleController::class, 'assign'])->name('roles.assign');
    Route::post('/roles/assign', [RoleController::class, 'storeAssign'])->name('roles.storeAssign');
    });

// Rutas de autenticación
Route::middleware('throttle')->prefix('auth')->group(function(){
    Route::get('login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('login', [AuthController::class, 'loginVerify'])->name('login.verify');
    Route::get('register', [AuthController::class, 'registerForm'])->name('register');
    Route::post('register', [AuthController::class, 'registerVerify'])->name('register.verify');
    Route::post('signOut', [AuthController::class, 'signOut'])->name('sign-Out');
});

// Rutas protegidas por autenticación
Route::middleware(['auth'])->prefix('dashboard')->group(function(){
    Route::get('/dashboard', function () {
        return view('welcome');
    })->name('dashboard');

    // Aquí defines tus otras rutas protegidas como las de Paciente, Medicina, etc.
    Route::resource('pacientes', PacienteController::class);
    Route::resource('vacunas', VacunaController::class);
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

    // Route::resource('examen_fisico', ExamenFisicoController::class);
    // Route::get('examen_fisico/create/{personaId}', [ExamenFisicoController::class, 'create'])->name('examen_fisico.create');
    // Route::post('examen_fisico/{personaId}', [ExamenFisicoController::class, 'store'])->name('examen_fisico.store');

    // routes/web.php
    //Route::resource('examen_fisico', ExamenFisicoController::class);
    Route::get('examen_fisico/create/{personaId}', [ExamenFisicoController::class, 'create'])->name('examen_fisico.create');
    Route::post('examen_fisico/{personaId}', [ExamenFisicoController::class, 'store'])->name('examen_fisico.store');
    Route::get('examen_fisico/{personaId?}', [ExamenFisicoController::class, 'index'])->name('examen_fisico.index');
    Route::get('examen_fisico/{personaId}/{id}', [ExamenFisicoController::class, 'show'])->name('examen_fisico.show');
    Route::get('examen_fisico/{personaId}/{id}/edit', [ExamenFisicoController::class, 'edit'])->name('examen_fisico.edit');
    Route::put('examen_fisico/{personaId}/{id}', [ExamenFisicoController::class, 'update'])->name('examen_fisico.update');

    // Ruta manual para destruir un examen físico
    Route::delete('examen_fisico/{personaId}/{id}', [ExamenFisicoController::class, 'destroy'])->name('examen_fisico.destroy');


    Route::resource('cie10', Cie10Controller::class);
    Route::resource('consulta_medica', ConsultaMedicaController::class);
    //Route::get('consulta_medica/create/{persona_id}', [ConsultaMedicaController::class, 'create'])->name('consulta_medica.create');
    Route::get('consulta_medica/create/{persona_id?}', [ConsultaMedicaController::class, 'create'])->name('consulta_medica.create');

    // Ruta de los roles
    Route::resource('roles', RoleController::class);

    //Ruta de las vistas enfermeras
    Route::resource('nurses', NurseController::class);

    Route::get('user_roles', [UserRoleController::class, 'index'])->name('user_roles.index');
    Route::get('user_roles/{id}/edit', [UserRoleController::class, 'edit'])->name('user_roles.edit');
    Route::put('user_roles/{id}', [UserRoleController::class, 'update'])->name('user_roles.update');

    
    // Otras rutas para las diferentes funcionalidades que has implementado
    Route::resource('roles', RoleController::class);
    Route::get('assign-role', [RoleController::class, 'assign'])->name('roles.assign');
    Route::post('assign-role', [RoleController::class, 'assignRole'])->name('roles.assignRole');
    Route::resource('nurses', NurseController::class);
        
    Route::get('/magician', function () {
        return view('halo');
    });

    Route::get('/cmp', function () {
        return view('consultamed');
    });

    



    });

