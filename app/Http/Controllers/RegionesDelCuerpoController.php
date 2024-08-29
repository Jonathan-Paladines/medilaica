<?php

namespace App\Http\Controllers;

use App\Models\RegionesDelCuerpo;
use Illuminate\Http\Request;

class RegionesDelCuerpoController extends Controller
{
    public function index()
    {
        $regiones = RegionesDelCuerpo::all();
        return view('regiones_cuerpo.index', compact('regiones'));
    }

    public function create()
    {
        return view('regiones_cuerpo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|string|max:255',
        ]);

        RegionesDelCuerpo::create($request->all());
        return redirect()->route('regiones_cuerpo.index')->with('success', 'Región creada con éxito.');
    }

    public function show($id)
    {
        $region = RegionesDelCuerpo::find($id); // Asumiendo que el modelo es Region y se busca por ID
        return view('regiones_cuerpo.show', compact('region'));
    }

    public function edit($id)
    {
        $region = RegionesDelCuerpo::find($id); // Asumiendo que el modelo es Region y se busca por ID
        return view('regiones_cuerpo.edit', compact('region'));
    }

    public function update(Request $request, RegionesDelCuerpo $regionesDelCuerpo)
    {
        $request->validate([
            'tipo' => 'required|string|max:255',
        ]);

        $regionesDelCuerpo->update($request->all());
        return redirect()->route('regiones_cuerpo.index')->with('success', 'Región actualizada con éxito.');
    }

    public function destroy(RegionesDelCuerpo $regionesDelCuerpo)
    {
        $regionesDelCuerpo->delete();
        return redirect()->route('regiones_cuerpo.index')->with('success', 'Región eliminada con éxito.');
    }
}

