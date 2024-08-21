<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\FamiliaresAntecedentes;
use Illuminate\Http\Request;

class PersonasAfamiliaresController extends Controller
{
    public function index($personaId)
    {


        $persona = Persona::findOrFail($personaId);
        $antecedentes = FamiliaresAntecedentes::all(); // Obtener todos los antecedentes quirúrgicos disponibles
        return view('PersonasAntecedentes/PersonasAfamiliares.index', compact('persona', 'antecedentes'));
    }

    public function create()
    {
        $personas = Persona::all();
        $antecedentes = FamiliaresAntecedentes::all();
        return view('PersonasAntecedentes/PersonasAfamiliares.create', compact('personas', 'antecedentes'));
    }

    public function store(Request $request, $personaId)
    {
        $request->validate([
            'familiares_antecedente_id' => 'required|exists:familiares_antecedentes,id',
        ]);

        $persona = Persona::findOrFail($personaId);
        $persona->familiaresAntecedentes()->attach($request->familiares_antecedente_id);

        return redirect()->route('personas_afamiliares.index', $personaId)->with('success', 'Antecedente familiar asociado con éxito.');
    }

    public function show($id)
    {
        $persona = Persona::findOrFail($id);
        $antecedente = FamiliaresAntecedentes::findOrFail($id);
        return view('PersonasAntecedentes.PersonasAfamiliares.index', compact('antecedente','persona'));
    }

    public function destroy($personaId, $antecedenteId)
    {
        $persona = Persona::findOrFail($personaId);
        $persona->familiaresAntecedentes()->detach($antecedenteId);

        return redirect()->route('personas_afamiliares.index', $personaId)->with('success', 'Antecedente familiar desasociado con éxito.');
    }
}
