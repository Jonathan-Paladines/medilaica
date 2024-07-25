<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Contacto;
use Illuminate\Http\Request;

class PersonaContactosController extends Controller
{
    public function index()
    {
        $personasContactos = Persona::with('contactos')->get();
        return view('personascontactos.index', compact('personasContactos'));
    }

    public function create()
    {
        $personas = Persona::all();
        $contactos = Contacto::all();
        return view('personascontactos.create', compact('personas', 'contactos'));
    }

    public function store(Request $request)
    {
        //$request->validate([
        //    'persona_id' => 'required|exists:personas,id',
        //    'contacto_id' => 'required|exists:contactos,id',
        //]);

        $persona = Persona::findOrFail($request->persona_id);
        $persona->contactos()->attach($request->contacto_id);

        return redirect()->route('personas_contactos.index')->with('success', 'Contacto asociado a la persona correctamente.');
    }

    public function destroy($personaId, $contactoId)
    {
        $persona = Persona::findOrFail($personaId);
        $persona->contactos()->detach($contactoId);

        return redirect()->route('personas_contactos.index')->with('success', 'Contacto desasociado de la persona correctamente.');
    }
}
