<?php

namespace App\Http\Controllers;

use App\Models\PersonalAntecedentes;
use Illuminate\Http\Request;

class PersonalAntecedentesController extends Controller
{
    public function index()
    {
        $antecedentes = PersonalAntecedentes::all();
        return view('Antecedentes.APersonales.index', compact('antecedentes'));
    }

    public function create()
    {
        return view('Antecedentes.APersonales.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'anteper' => 'required|string|max:230',
        ]);

        PersonalAntecedentes::create($request->all());
        return redirect()->route('personal_antecedentes.index')->with('success', 'Antecedente creado con éxito.');
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

        return redirect()->route('personal_antecedentes.index')->with('success', 'Antecedente actualizado con éxito.');
    }

    public function destroy($id)
    {
        $antecedente = PersonalAntecedentes::findOrFail($id);
        $antecedente->delete();

        return redirect()->route('personal_antecedentes.index')->with('success', 'Antecedente eliminado con éxito.');
    }
}
