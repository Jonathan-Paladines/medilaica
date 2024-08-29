<?php

namespace App\Http\Controllers;

use App\Models\ExamenFisico;
use App\Models\DetalleExamenFisico;
use Illuminate\Http\Request;

class ExamenFisicoController extends Controller
{
    public function index()
    {
        $examenes = ExamenFisico::with('detalle')->get();
        return view('examen_fisico.index', compact('examenes'));
    }

    public function create()
    {
        $detalles = DetalleExamenFisico::all();
        return view('examen_fisico.create', compact('detalles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'detalle_examen_fisico_id' => 'required',
            'observacion' => 'required|string',
        ]);

        ExamenFisico::create($request->all());
        return redirect()->route('examen_fisico.index')->with('success', 'Examen Físico creado exitosamente.');
    }

    public function show($id)
    {
        $examenFisico = ExamenFisico::with('detalle')->findOrFail($id);
        return view('examen_fisico.show', compact('examenFisico'));
    }

    public function edit($id)
    {
        $examenFisico = ExamenFisico::findOrFail($id);
        $detalles = DetalleExamenFisico::all();
        return view('examen_fisico.edit', compact('examenFisico', 'detalles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'detalle_examen_fisico_id' => 'required',
            'observacion' => 'required|string',
        ]);

        $examenFisico = ExamenFisico::findOrFail($id);
        $examenFisico->update($request->all());

        return redirect()->route('examen_fisico.index')->with('success', 'Examen Físico actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $examenFisico = ExamenFisico::findOrFail($id);
        $examenFisico->delete();

        return redirect()->route('examen_fisico.index')->with('success', 'Examen Físico eliminado exitosamente.');
    }
}
