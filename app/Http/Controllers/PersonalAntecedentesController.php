<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\PersonalAntecedentes;
use Illuminate\Http\Request;

class PersonalAntecedentesController extends Controller
{
    public function index($persona_id)
    {
        //$persona = Persona::findOrFail($persona_id);
        $antecedentes = $persona->personalAntecedentes;
        return view('Antecedentes.APersonales.index', compact('antecedentes'));
    }

    public function create()
    {
        
        return view('Antecedentes.APersonales.create');
    }

    public function store(Request $request)
    {
        $paciente_id=$request->input('paciente_id');
        $antecedentes = PersonalAntecedentes::create($request->all());

        return redirect()->route('personal_antecedentes.index', $paciente_id);
    }

    public function show($id, $persona_id)
    {
        $persona = Persona::findOrFail($persona_id);
        $antecedente = PersonalAntecedentes::findOrFail($id);
        return view('Antecedentes.APersonales.show', compact('antecedente','persona'));
    }

    public function edit($id)
    {
        $antecedente = PersonalAntecedentes::findOrFail($id);
        return view('Antecedentes.APersonales.edit', compact('antecedente'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'anteper' => 'required|string|max:230',
        ]);

        $antecedente = PersonalAntecedentes::findOrFail($id);
        $antecedente->update($request->all());

        return redirect()->route('personal_antecedentes.index', $antecedente->persona_id)->with('success', 'Antecedente actualizado con éxito.');
    }

    public function destroy($id)
    {
        $antecedente = PersonalAntecedentes::findOrFail($id);
        $antecedente->delete();

        return redirect()->route('personal_antecedentes.index', $antecedente->persona_id)->with('success', 'Antecedente eliminado con éxito.');
    }
}
