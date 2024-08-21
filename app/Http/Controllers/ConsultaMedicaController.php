<?php

namespace App\Http\Controllers;

use App\Models\ConsultaMedica;
use Illuminate\Http\Request;

class ConsultaMedicaController extends Controller
{
    public function index()
    {
        $consultas = ConsultaMedica::all();
        return view('consulta_medica.index', compact('consultas'));
    }

    public function create()
    {
        return view('consulta_medica.create');
    }

    public function store(Request $request)
    {
        $consulta = ConsultaMedica::create($request->all());
        return redirect()->route('consulta_medica.index', 'consulta')->with('success', 'Consulta creada correctamente.');
    }

    public function show(ConsultaMedica $consultaMedica)
    {
        $consultas = ConsultaMedica::all();
        return view('consulta_medica.show', compact('consultas'));
    }

    public function edit(ConsultaMedica $consultaMedica)
    {
        return view('consulta_medica.edit', compact('consultaMedica'));
    }

    public function update(Request $request, ConsultaMedica $consultaMedica)
    {
        $consultaMedica->update($request->all());
        return redirect()->route('consulta_medica.index')->with('success', 'Consulta actualizada correctamente.');
    }

    public function destroy(ConsultaMedica $consultaMedica)
    {
        $consultaMedica->delete();
        return redirect()->route('consulta_medica.index')->with('success', 'Consulta eliminada correctamente.');
    }
}
