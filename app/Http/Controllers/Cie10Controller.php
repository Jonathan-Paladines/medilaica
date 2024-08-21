<?php

namespace App\Http\Controllers;

use App\Models\Cie10;
use Illuminate\Http\Request;

class Cie10Controller extends Controller
{
    public function index()
    {
        $Cie10s = Cie10::paginate(50);
        return view('cie10.index', compact('Cie10s'));
    }

    public function create()
    {
        return view('cie10.create');
    }

    public function store(Request $request)
    {
        $Cie10 = Cie10::create($request->all());
        return redirect()->route('cie10.index')->with('success', 'Código CIE10 creado correctamente.');
    }

    public function show(Cie10 $cie10)
    {
        return view('cie10.show', compact('cie10'));
    }

    public function edit(Cie10 $cie10)
    {
        return view('cie10.edit', compact('cie10'));
    }

    public function update(Request $request, Cie10 $cie10)
    {
        $cie10->update($request->all());
        return redirect()->route('cie10.index')->with('success', 'Código CIE10 actualizado correctamente.');
    }

    public function destroy(Cie10 $cie10)
    {
        $cie10->delete();
        return redirect()->route('cie10.index')->with('success', 'Código CIE10 eliminado correctamente.');
    }

    public function autocomplete(Request $request)
    {
        $term = $request->get('term');

        $results = Cie10::where('detalle_cie', 'LIKE', '%' . $term . '%')
                        ->orWhere('codigo', 'LIKE', '%' . $term . '%')
                        ->get(['id', 'detalle_cie as value']); // 'value' es el formato que jQuery UI espera

        return response()->json($results);
    }
}
