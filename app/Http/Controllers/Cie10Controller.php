<?php

namespace App\Http\Controllers;

use App\Models\Cie10;
use Illuminate\Http\Request;

class Cie10Controller extends Controller
{
    public function index()
    {
        $cie10 = Cie10::all();
        return view('cie10.index', compact('cie10'));
    }

    public function create()
    {
        return view('cie10.create');
    }

    public function store(Request $request)
    {
        //$request->validate([
        //    'codigo' => 'required|string|max:255',
        //    'descripcion' => 'required|string|max:255',
        //]);

        Cie10::create($request->all());
        return redirect()->route('cie10.index')->with('success', 'CIE10 creado con éxito.');
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
        return redirect()->route('cie10.index')->with('success', 'CIE10 actualizado con éxito.');
    }

    public function destroy(Cie10 $cie10)
    {
        $cie10->delete();
        return redirect()->route('cie10.index')->with('success', 'CIE10 eliminado con éxito.');
    }
}
