<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Vacuna;
use Illuminate\Http\Request;

class PersonaVacunasController extends Controller
{
    public function index()
    {
        $personasVacunas = Persona::with('vacunas')->get();
        //dd ($personasVacunas);
        return view('personasvacunas.index', compact('personasVacunas'));
    }

    public function create()
    {
        $personas = Persona::all();
        $vacunas = Vacuna::all();
        $personasVacunas = Persona::with('vacunas')->get();
        return view('personasvacunas.create', compact('personas', 'vacunas', 'personasVacunas'));
    }

    public function store(Request $request)
    {
        //$request->validate([
        //    'persona_id' => 'required|exists:personas,id',
        //    'vacuna_id' => 'required|exists:vacunas,id',
        //    'numero_dosis' => 'required|integer',
        //    'fecha_vacuna' => 'nullable|date',
        //    'observacion' => 'nullable|string',
        //]);

        $persona = Persona::findOrFail($request->persona_id);
        $persona->vacunas()->attach($request->vacuna_id, [
            'numero_dosis' => $request->numero_dosis,
            'fecha_vacuna' => $request->fecha_vacuna,
            'observacion' => $request->observacion,
        ]);

        return redirect()->route('personas_vacunas.create')->with('success', 'Vacuna asociada a la persona correctamente.');
    }

    public function destroy($personaId, $vacunaId)
    {
        $persona = Persona::findOrFail($personaId);
        $persona->vacunas()->detach($vacunaId);

        return redirect()->route('personas_vacunas.create')->with('success', 'Vacuna desasociada de la persona correctamente.');
    }
}
