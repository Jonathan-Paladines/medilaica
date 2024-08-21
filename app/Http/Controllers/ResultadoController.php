<?php

namespace App\Http\Controllers;

use App\Models\Resultado;
use Illuminate\Http\Request;

class ResultadoController extends Controller
{
    public function index()
    {
        $resultados = Resultado::all();
        return view('resultado.index', compact('resultados'));
    }

    public function create()
    {
        return view('resultado.create');
    }

    public function store(Request $request)
    {
        $resultado = Resultado::create($request->all());
        return redirect()->route('resultado.index')->with('success', 'Resultado creado correctamente.');
    }

    public function show(Resultado $resultado)
    {
        return view('resultado.show', compact('resultado'));
    }

    public function edit(Resultado $resultado)
    {
        return view('resultado.edit', compact('resultado'));
    }

    public function update(Request $request, Resultado $resultado)
    {
        $resultado->update($request->all());
        return redirect()->route('resultado.index')->with('success', 'Resultado actualizado correctamente.');
    }

    public function destroy(Resultado $resultado)
    {
        $resultado->delete();
        return redirect()->route('resultado.index')->with('success', 'Resultado eliminado correctamente.');
    }
}
