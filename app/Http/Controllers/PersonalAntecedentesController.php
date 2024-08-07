<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\PersonalAntecedentes;
use Illuminate\Http\Request;

class PersonalAntecedentesController extends Controller
{
    public function index($persona_id)
    {
        $persona = Persona::findOrFail($persona_id);
        $antecedentes = PersonalAntecedentes::all();
        return view('Antecedentes.APersonales.index', compact('persona','antecedentes'));
    }

    public function create($persona_id)
    {
        $persona = Persona::findOrFail($persona_id);
        return view('Antecedentes.APersonales.create', compact('persona'));
    }

    public function store(Request $request, $persona_id)
    {
        $request->validate([
            'anteper' => 'required|string|max:230',
        ]);

        $antecedente = new PersonalAntecedentes($request->all());
        $antecedente->persona_id = $persona_id;
        $antecedente->save();

        PersonalAntecedentes::create($request->all());
        return redirect()->route('personal_antecedentes.index', $persona_id)->with('success', 'Antecedente creado con éxito.');
    }

    public function show($id)
    {
        $antecedente = PersonalAntecedentes::findOrFail($id);
        return view('Antecedentes.APersonales.show', compact('antecedente'));
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
