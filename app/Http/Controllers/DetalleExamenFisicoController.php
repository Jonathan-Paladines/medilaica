<?php

namespace App\Http\Controllers;

use App\Models\DetalleExamenFisico;
use App\Models\RcuerpoOef;
use Illuminate\Http\Request;

class DetalleExamenFisicoController extends Controller
{
    public function index()
    {
        $detalles = DetalleExamenFisico::with('rcuerpoOef.region', 'rcuerpoOef.opcionExamenFisico')->get();
        return view('detalle_examen_fisico.index', compact('detalles'));
    }

    public function create()
    {
        $rcuerpoOefs = RcuerpoOef::with(['region', 'opcionExamenFisico'])->get();
        return view('detalle_examen_fisico.create', compact('rcuerpoOefs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rcuerpo_oef_id' => 'required|integer',
        ]);

        $data = $request->all();
        $data['estado'] = $request->has('estado') ? 1 : 0;

        DetalleExamenFisico::create($data);
        return redirect()->route('detalle_examen_fisico.index')->with('success', 'Detalle creado con éxito.');
    }

    public function show(DetalleExamenFisico $detalleExamenFisico)
    {
        return view('detalle_examen_fisico.show', compact('detalleExamenFisico'));
    }

    public function edit(DetalleExamenFisico $detalleExamenFisico)
    {
        $rcuerpoOefs = RcuerpoOef::with(['region', 'opcionExamenFisico'])->get();
        return view('detalle_examen_fisico.edit', compact('detalleExamenFisico', 'rcuerpoOefs'));
    }

    public function update(Request $request, DetalleExamenFisico $detalleExamenFisico)
    {
        $request->validate([
            'rcuerpo_oef_id' => 'required|integer',
        ]);

        $data = $request->all();
        $data['estado'] = $request->has('estado') ? 1 : 0;

        $detalleExamenFisico->update($data);
        return redirect()->route('detalle_examen_fisico.index')->with('success', 'Detalle actualizado con éxito.');
    }

    public function destroy(DetalleExamenFisico $detalleExamenFisico)
    {
        $detalleExamenFisico->delete();
        return redirect()->route('detalle_examen_fisico.index')->with('success', 'Detalle eliminado con éxito.');
    }
}
