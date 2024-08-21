<?php

namespace App\Http\Controllers;

use App\Models\Campo;
use Illuminate\Http\Request;

class CampoController extends Controller
{
    public function index()
    {
        $campos = Campo::all();
        return view('campos.index', compact('campos'));
    }

    public function create()
    {
        return view('campos.create');
    }

    public function store(Request $request)
    {
        $campo = Campo::create($request->all());
        return redirect()->route('campos.index')->with('success', 'Campo creado correctamente.');
    }

    public function show(Campo $campo)
    {
        return view('campos.show', compact('campo'));
    }

    public function edit(Campo $campo)
    {
        return view('campos.edit', compact('campo'));
    }

    public function update(Request $request, Campo $campo)
    {
        $campo->update($request->all());
        return redirect()->route('campos.index')->with('success', 'Campo actualizado correctamente.');
    }

    public function destroy(Campo $campo)
    {
        $campo->delete();
        return redirect()->route('campo.index')->with('success', 'Campo eliminado correctamente.');
    }
}
