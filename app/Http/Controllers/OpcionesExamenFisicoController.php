<?php

namespace App\Http\Controllers;

use App\Models\OpcionesExamenFisico;
use Illuminate\Http\Request;

class OpcionesExamenFisicoController extends Controller
{
    public function index()
    {
        $opciones = OpcionesExamenFisico::all();
        return view('opciones_examen_fisico.index', compact('opciones'));
    }

    public function create()
    {
        return view('opciones_examen_fisico.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'campo' => 'required|string|max:255',
        ]);

        OpcionesExamenFisico::create($request->all());
        return redirect()->route('opciones_examen_fisico.index')->with('success', 'Opción creada con éxito.');
    }

    public function show(OpcionesExamenFisico $opcionesExamenFisico)
    {
        return view('opciones_examen_fisico.show', compact('opcionesExamenFisico'));
    }

    public function edit(OpcionesExamenFisico $opcionesExamenFisico)
    {
        return view('opciones_examen_fisico.edit', compact('opcionesExamenFisico'));
    }

    public function update(Request $request, OpcionesExamenFisico $opcionesExamenFisico)
    {
        $request->validate([
            'campo' => 'required|string|max:255',
        ]);

        $opcionesExamenFisico->update($request->all());
        return redirect()->route('opciones_examen_fisico.index')->with('success', 'Opción actualizada con éxito.');
    }

    public function destroy(OpcionesExamenFisico $opcionesExamenFisico)
    {
        $opcionesExamenFisico->delete();
        return redirect()->route('opciones_examen_fisico.index')->with('success', 'Opción eliminada con éxito.');
    }
}
