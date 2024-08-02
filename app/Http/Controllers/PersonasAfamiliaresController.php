<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\FamiliaresAntecedentes;
use Illuminate\Http\Request;

class PersonasAfamiliaresController extends Controller
{
    public function index($persona_id)
    {
        $persona = Persona::findOrFail($persona_id);
        $antecedentes = FamiliaresAntecedentes::all();
        return view('PersonasAntecedentes/PersonasAfamiliares.index', compact('persona', 'antecedentes'));
    }

    public function store(Request $request, $persona_id)
    {
        $request->validate([
            'familiares_antecedente_id' => 'required|exists:familiares_antecedentes,id',
        ]);

        $persona = Persona::findOrFail($persona_id);
        $persona->familiaresAntecedentes()->attach($request->familiares_antecedente_id);

        return redirect()->route('personas_afamiliares.index', $persona_id)->with('success', 'Antecedente familiar asociado con éxito.');
    }

    public function destroy($persona_id, $antecedente_id)
    {
        $persona = Persona::findOrFail($persona_id);
        $persona->familiaresAntecedentes()->detach($antecedente_id);

        return redirect()->route('personas_afamiliares.index', $persona_id)->with('success', 'Antecedente familiar desasociado con éxito.');
    }
}
