<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\PersonalAntecedentes;
use Illuminate\Http\Request;

class PersonasAntecedentesController extends Controller
{
    public function index($personaId)
    {
        $persona = Persona::findOrFail($personaId);
        $antecedentes = PersonalAntecedentes::all(); // Obtener todos los antecedentes personales disponibles
        return view('PersonasAntecedentes/PersonasApersonales.index', compact('persona', 'antecedentes'));
    }

    public function create()
    {
        $personas = Persona::all();
        $antecedentes = PersonalAntecedentes::all();
        return view('PersonasAntecedentes/PersonasApersonales.create', compact('personas', 'antecedentes'));
    }

    public function store(Request $request, $personaId)
    {
        
        $request->validate([
            'personal_antecedentes_id' => 'required|exists:personal_antecedentes,id',
        ]);

        $persona = Persona::findOrFail($personaId);
        $persona->personalAntecedentes()->attach($request->personal_antecedentes_id);

        return redirect()->route('personas_antecedentes.index', $personaId)->with('success', 'Antecedente asociado correctamente.');
    }

    public function show($id)
    {
        $persona = Persona::findOrFail($id);
        $antecedentes = $persona->personalAntecedentes; // Obtiene los antecedentes asociados
        return view('PersonasAntecedentes/PersonasApersonales.show', compact('persona', 'antecedentes'));
    }

    public function destroy($personaId, $antecedenteId)
    {
        $persona = Persona::findOrFail($personaId);
        $persona->personalAntecedentes()->detach($antecedenteId); // Usar el ID correcto para desasociar

        return redirect()->route('personas_antecedentes.index', $personaId)->with('success', 'Antecedente desasociado con éxito.');
    }
}
