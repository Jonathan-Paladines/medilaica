<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Habitos;
use Illuminate\Http\Request;

class PersonaHabitosController extends Controller
{
    public function index($personaId)
    {
        $persona = Persona::findOrFail($personaId);
        $habitos = Habitos::all();
        return view('PersonasHabitos.index', compact('persona', 'habitos'));
    }

    public function store(Request $request, $personaId)
    {
        $request->validate([
            'habitos_id' => 'required|exists:habitos,id',
        ]);

        $persona = Persona::findOrFail($personaId);
        $persona->habitos()->attach($request->habitos_id);

        return redirect()->route('personas.habitos.index', $personaId)->with('success', 'Hábito asociado con éxito.');
    }

    public function destroy($personaId, $habitosId)
    {
        $persona = Persona::findOrFail($personaId);
        $persona->habitos()->detach($habitosId);

        return redirect()->route('personas.habitos.index', $personaId)->with('success', 'Hábito desasociado con éxito.');
    }
}
