<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\QuirurgicosAntecedentes;
use Illuminate\Http\Request;

class PersonasAquirurgicosController extends Controller
{
    public function index($personaId)
    {
        //echo 'te entró'.$personaId;
        //exit();
        $persona = Persona::findOrFail($personaId);
        $antecedentes = QuirurgicosAntecedentes::all(); // Obtener todos los antecedentes quirúrgicos disponibles
        return view('PersonasAntecedentes.PersonasAquirurgicos.index', compact('persona', 'antecedentes'));
    }
    

    public function create()
    {
        $personas = Persona::all();
        $antecedentes = QuirurgicosAntecedentes::all();
        return view('PersonasAntecedentes/PersonasAquirurgicos.create', compact('personas', 'antecedentes'));
    }

    public function store(Request $request, $personaId)
    {
        $request->validate([
            'quirurgicos_antecedente_id' => 'required|exists:quirurgicos_antecedentes,id',
        ]);
    
        $persona = Persona::findOrFail($personaId);
        $persona->quirurgicosAntecedentes()->attach($request->quirurgicos_antecedente_id);
    
        return redirect()->route('personas_aquirurgicos.index', $personaId)->with('success', 'Antecedente quirúrgico asignado con éxito.');
    }

    public function show($id)
    {
        $persona = Persona::findOrFail($id);
        $antecedente = QuirurgicosAntecedentes::findOrFail($id);
        return view('PersonasAntecedentes.PersonasAquirurgicos.index', compact('antecedente','persona'));
    }

    public function destroy($personaId, $antecedenteId)
    {
        $persona = Persona::findOrFail($personaId);
        $persona->quirurgicosAntecedentes()->detach($antecedenteId);
    
        return redirect()->route('personas_aquirurgicos.index', $personaId)->with('success', 'Antecedente quirúrgico removido con éxito.');
    }
}
