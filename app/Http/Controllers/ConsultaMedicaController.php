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
        $request->validate([
            'persona_id' => 'required|integer',
            'cie10_id' => 'required|integer',
            'detalles' => 'required|string|max:255',
        ]);

        ConsultaMedica::create($request->all());
        return redirect()->route('consulta-medica.index')->with('success', 'Consulta médica creada con éxito.');
    }

    public function show(ConsultaMedica $consultaMedica)
    {
        return view('consulta_medica.show', compact('consultaMedica'));
    }

    public function edit(ConsultaMedica $consultaMedica)
    {
        return view('consulta_medica.edit', compact('consultaMedica'));
    }

    public function update(Request $request, ConsultaMedica $consultaMedica)
    {
        $request->validate([
            'persona_id' => 'required|integer',
            'cie10_id' => 'required|integer',
            'detalles' => 'required|string|max:255',
        ]);

        $consultaMedica->update($request->all());
        return redirect()->route('consulta-medica.index')->with('success', 'Consulta médica actualizada con éxito.');
    }

    public function destroy(ConsultaMedica $consultaMedica)
    {
        $consultaMedica->delete();
        return redirect()->route('consulta-medica.index')->with('success', 'Consulta médica eliminada con éxito.');
    }
}
