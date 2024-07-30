<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Contacto;
use App\Models\PersonasContactos;
use Illuminate\Http\Request;

class PersonaContactosController extends Controller
{
    public function index($persona_id = null)
    {
        $personas = Persona::all();
        $contactos = Contacto::all();
        $personasContactos = PersonasContactos::with('contactos')->get();

        if ($persona_id) {
            $personasContactos = Persona::with('contactos')->where('id', $persona_id)->get();
        }

        return view('personas_contactos.create', compact('personas', 'contactos', 'personasContactos', 'persona_id'));
    }

    public function store(Request $request)
    {
        $personaContacto = new PersonasContactos();
        $personaContacto->persona_id = $request->input('persona_id');
        $personaContacto->contacto_id = $request->input('contacto_id');
        $personaContacto->save();

        return redirect()->route('personas_contactos.index', ['persona_id' => $request->input('persona_id')])
                         ->with('success', 'Contacto asociado exitosamente.');
    }

    public function destroy($persona_id, $contacto_id)
    {
        PersonasContactos::where('persona_id', $persona_id)
                       ->where('contacto_id', $contacto_id)
                       ->delete();

        return redirect()->route('personas_contactos.index', ['persona_id' => $persona_id])
                         ->with('success', 'Contacto desasociado exitosamente.');
    }
}
