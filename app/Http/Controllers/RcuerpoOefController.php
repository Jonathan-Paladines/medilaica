<?php

namespace App\Http\Controllers;

use App\Models\RcuerpoOef;
use App\Models\RegionesDelCuerpo;  // Asegúrate de importar los modelos correctos
use App\Models\OpcionesExamenFisico;
use Illuminate\Http\Request;

class RcuerpoOefController extends Controller
{
    public function index()
    {
        $rcuerpoOefs = RcuerpoOef::all();
        return view('rcuerpo_oef.index', compact('rcuerpoOefs'));
    }

    public function create()
    {
        $regiones = RegionesDelCuerpo::all();  // Obtén todas las regiones del cuerpo
        $opciones = OpcionesExamenFisico::all();  // Obtén todas las opciones de examen físico
        return view('rcuerpo_oef.create', compact('regiones', 'opciones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tcampo_id' => 'required|integer',
            'campo_id' => 'required|integer',
        ]);

        RcuerpoOef::create($request->all());
        return redirect()->route('rcuerpo_oef.index')->with('success', 'Asociación creada con éxito.');
    }

    public function show($id)
    {
        $rcuerpoOef = RcuerpoOef::with(['region', 'opcionExamenFisico'])->find($id); // Cargar las relaciones
        if (!$rcuerpoOef) {
        return redirect()->route('rcuerpo_oef.index')->with('error', 'Registro no encontrado.');
    }
    return view('rcuerpo_oef.show', compact('rcuerpoOef'));
    }

    public function edit($id)
    {
        $rcuerpoOef = RcuerpoOef::with(['region', 'opcionExamenFisico'])->find($id);
        $regiones = RegionesDelCuerpo::all();
        $opciones = OpcionesExamenFisico::all();
        return view('rcuerpo_oef.edit', compact('rcuerpoOef', 'regiones', 'opciones'));
    }

    public function update(Request $request, RcuerpoOef $rcuerpoOef)
    {
        $request->validate([
            'tcampo_id' => 'required|integer',
            'campo_id' => 'required|integer',
        ]);

        $rcuerpoOef->update($request->all());
        return redirect()->route('rcuerpo-oef.index')->with('success', 'Asociación actualizada con éxito.');
    }

    public function destroy(RcuerpoOef $rcuerpoOef)
    {
        $rcuerpoOef->delete();
        return redirect()->route('rcuerpo_oef.index')->with('success', 'Asociación eliminada con éxito.');
    }
}
