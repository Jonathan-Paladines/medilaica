<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\PersonalAntecedentes;
use Illuminate\Http\Request;

class PersonasAntecedentesController extends Controller
{
    public function index($persona_id)
    {
        $persona = Persona::findOrFail($persona_id);
        $antecedentes = PersonalAntecedentes::all();
        return view('PersonasAntecedentes/PersonasApersonales.index', compact('persona', 'antecedentes'));
    }

    public function store(Request $request, $persona_id)
    {
        $request->validate([
            'personal_antecedente_id' => 'required|exists:personal_antecedentes,id',
        ]);

        $persona = Persona::findOrFail($persona_id);
        $persona->personalAntecedentes()->attach($request->personal_antecedente_id);

        return redirect()->route('personas_antecedentes.index', $persona_id)->with('success', 'Antecedente asociado con éxito.');
    }

    public function destroy($persona_id, $personal_antecedente_id)
    {
        $persona = Persona::findOrFail($persona_id);
        $persona->personalAntecedentes()->detach($personal_antecedente_id);

        return redirect()->route('personas_antecedentes.index', $persona_id)->with('success', 'Antecedente desasociado con éxito.');
    }
}
