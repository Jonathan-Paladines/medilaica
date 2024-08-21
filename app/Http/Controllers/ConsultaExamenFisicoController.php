<?php

namespace App\Http\Controllers;

use App\Models\ConsultaExamenFisico;
use Illuminate\Http\Request;

class ConsultaExamenFisicoController extends Controller
{
    public function index()
    {
        $examenesFisicos = ConsultaExamenFisico::all();
        return view('consulta_examen_fisico.index', compact('examenesFisicos'));
    }

    public function create()
    {
        return view('consulta_examen_fisico.create');
    }

    public function store(Request $request)
    {
        $examenFisico = ConsultaExamenFisico::create($request->all());
        return redirect()->route('consulta_examen_fisico.index')->with('success', 'Examen físico creado correctamente.');
    }

    public function show(ConsultaExamenFisico $consultaExamenFisico)
    {
        return view('consulta_examen_fisico.show', compact('consultaExamenFisico'));
    }

    public function edit(ConsultaExamenFisico $consultaExamenFisico)
    {
        return view('consulta_examen_fisico.edit', compact('consultaExamenFisico'));
    }

    public function update(Request $request, ConsultaExamenFisico $consultaExamenFisico)
    {
        $consultaExamenFisico->update($request->all());
        return redirect()->route('consulta_examen_fisico.index')->with('success', 'Examen físico actualizado correctamente.');
    }

    public function destroy(ConsultaExamenFisico $consultaExamenFisico)
    {
        $consultaExamenFisico->delete();
        return redirect()->route('consulta_examen_fisico.index')->with('success', 'Examen físico eliminado correctamente.');
    }
}
