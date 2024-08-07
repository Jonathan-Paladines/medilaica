<?php

namespace App\Http\Controllers;

use App\Models\QuirurgicosAntecedentes;
use Illuminate\Http\Request;

class QuirurgicosAntecedentesController extends Controller
{
    public function index()
    {
        $antecedentes = QuirurgicosAntecedentes::all();
        return view('Antecedentes.AQuirurgicos.index', compact('antecedentes'));
    }

    public function create()
    {
        return view('Antecedentes.AQuirurgicos.create');
    }

    public function store(Request $request)
    {
        $antecedente = QuirurgicosAntecedentes::create($request->all());
    
        return response()->json([
            'success' => true,
            'id' => $antecedente->id,
            'antequi' => $antecedente->antequi
        ]);
    }

    public function show($id)
    {
        $antecedente = QuirurgicosAntecedentes::findOrFail($id);
        return view('Antecedentes.AQuirurgicos.show', compact('antecedente'));
    }

    public function edit($id)
    {
        $antecedente = QuirurgicosAntecedentes::findOrFail($id);
        return view('Antecedentes.AQuirurgicos.edit', compact('antecedente'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'antequi' => 'required|string|max:230',
        ]);

        $antecedente = QuirurgicosAntecedentes::findOrFail($id);
        $antecedente->update($request->all());

        return redirect()->route('quirurgicos_antecedentes.index')->with('success', 'Antecedente actualizado con éxito.');
    }

    public function destroy($id)
    {
        $antecedente = QuirurgicosAntecedentes::findOrFail($id);
        $antecedente->delete();

        return redirect()->route('quirurgicos_antecedentes.index')->with('success', 'Antecedente eliminado con éxito.');
    }
}
