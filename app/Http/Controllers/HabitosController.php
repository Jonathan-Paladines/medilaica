<?php

namespace App\Http\Controllers;

use App\Models\Habitos;
use Illuminate\Http\Request;

class HabitosController extends Controller
{
    public function index()
    {
        $habitos = Habitos::all();
        return view('Habitos.index', compact('habitos'));
    }

    public function create()
    {
        return view('Habitos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'habitos' => 'required|string|max:230',
        ]);

        Habitos::create($request->all());
        return redirect()->route('habitos.index')->with('success', 'Hábito creado con éxito.');
    }

    public function show($id)
    {
        $habito = Habitos::findOrFail($id);
        return view('Habitos.show', compact('habito'));
    }

    public function edit($id)
    {
        $habito = Habitos::findOrFail($id);
        return view('Habitos.edit', compact('habito'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'habitos' => 'required|string|max:230',
        ]);

        $habito = Habitos::findOrFail($id);
        $habito->update($request->all());

        return redirect()->route('habitos.index')->with('success', 'Hábito actualizado con éxito.');
    }

    public function destroy($id)
    {
        $habito = Habitos::findOrFail($id);
        $habito->delete();

        return redirect()->route('habitos.index')->with('success', 'Hábito eliminado con éxito.');
    }
}
