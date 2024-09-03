<?php

namespace App\Http\Controllers;

use App\Models\ConsultaMedica;
use App\Models\Persona;
use App\Models\ExamenFisico;
use Illuminate\Http\Request;

class ConsultaMedicaController extends Controller
{
    public function index()
    {
        $consultas = ConsultaMedica::all();
        return view('consulta_medica.index', compact('consultas'));
    }

    public function create($personaId)
    {
        $persona = Persona::findOrFail($personaId);
        $examenes_fisicos = ExamenFisico::all();
        return view('consulta_medica.create', compact('persona','examenes_fisicos'));
    }

    public function store(Request $request)
    {
        $consulta = new ConsultaMedica();
        //$consulta->paciente_id = $request->paciente_id;
        $consulta->examen_fisico_id = $request->examen_fisico_id;
        $consulta->motivo_consulta = $request->motivo_consulta;
        $consulta->diagnostico = $request->diagnostico;
        $consulta->tratamiento = $request->tratamiento;
        $consulta->observaciones = $request->observaciones;
        $consulta->save();
    
        // Guardar los detalles del examen físico seleccionados
        $consulta->detalles()->attach($request->detalles);
    
        return redirect()->route('consulta_medica.index')->with('success', 'Consulta médica creada con éxito.');
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
