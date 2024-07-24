<?php

namespace App\Http\Controllers;

use App\Models\Vacuna;
use Illuminate\Http\Request;

class VacunaController extends Controller
{
    public function create()
    {
    
        return view('vacunas.create');
    }

    public function store(Request $request)
    {
        $vacuna = Vacuna::create($request->all());

        return redirect()->route('vacunas.show', $vacuna);
    }

    public function show(Vacuna $vacuna)
    {
        return view('vacunas.show', compact('vacuna'));
    }

    public function index()
    {
        $vacunas = Vacuna::all();
        return view('vacunas.index', compact('vacunas'));
    }

    public function edit(Vacuna $vacuna)
    {
        return view('vacunas.edit', compact('vacuna'));
    }

    public function update(Request $request, Vacuna $vacuna)
    {


        $vacuna->update($request->all());

        return redirect()->route('vacunas.index')->with('success', 'Vacuna actualizada con éxito');
    }

    public function destroy($id)
    {
        $vacunas = Vacuna::findOrFail($id);
        $vacunas->delete();

        return redirect()->route('vacunas.index')->with('success', 'Vacuna eliminada exitosamente');
    }
}
