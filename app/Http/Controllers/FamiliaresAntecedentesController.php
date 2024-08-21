<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\FamiliaresAntecedentes;
use Illuminate\Http\Request;

class FamiliaresAntecedentesController extends Controller
{
    public function index()
    {
        $antecedentes = FamiliaresAntecedentes::all();
        return view('Antecedentes.AFamiliares.index', compact('antecedentes'));
    }

    public function create()
    {
        return view('Antecedentes.AFamiliares.create');
    }

    public function store(Request $request)
    {
        $paciente_id=$request->input('paciente_id');
        $antecedentes = FamiliaresAntecedentes::create($request->all());
        
        return redirect()->route('personas_afamiliares.index', $paciente_id);
    }                           

    public function show($id)
    {
        $antecedente = FamiliaresAntecedentes::findOrFail($id);
        return view('Antecedentes.AFamiliares.show', compact('antecedente'));
    }

    public function edit($id)
    {
        $antecedente = FamiliaresAntecedentes::findOrFail($id);
        return view('Antecedentes.AFamiliares.edit', compact('antecedente'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'antefam' => 'required|string|max:230',
        ]);

        $antecedente = FamiliaresAntecedentes::findOrFail($id);
        $antecedente->update($request->all());

        return redirect()->route('familiares_antecedentes.index')->with('success', 'Antecedente actualizado con éxito.');
    }

    public function destroy($id)
    {
        $antecedente = FamiliaresAntecedentes::findOrFail($id);
        $antecedente->delete();

        return redirect()->route('familiares_antecedentes.index')->with('success', 'Antecedente eliminado con éxito.');
    }
}
