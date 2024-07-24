<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Alergia;
use Illuminate\Http\Request;

class PersonaAlergiaController extends Controller
{
    public function index()
    {
        $personasAlergias = Persona::with('alergias')->get();
        return view('personasalergias.index', compact('personasAlergias'));
    }

    public function create()
    {
        $personas = Persona::all();
        $alergias = Alergia::all();
        return view('personasalergias.create', compact('personas', 'alergias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'persona_id' => 'required|exists:personas,id',
            'alergia_id' => 'required|exists:alergias,id',
        ]);

        $persona = Persona::findOrFail($request->persona_id);
        $persona->alergias()->attach($request->alergia_id);

        return redirect()->route('personasalergias.index')->with('success', 'Alergia asociada a la persona correctamente.');
    }

    public function destroy($personaId, $alergiaId)
    {
        $persona = Persona::findOrFail($personaId);
        $persona->alergias()->detach($alergiaId);

        return redirect()->route('personasalergias.index')->with('success', 'Alergia desasociada de la persona correctamente.');
    }
}
