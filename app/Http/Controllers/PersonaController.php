<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Paises;
use App\Models\Ecivil;
use App\Models\Sexo;
use App\Models\Etnia;
use App\Models\Tsangre;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:Admin');
    }




    public function index()
    {
        $personas = Persona::all();
        return view('personas.index', compact('personas'));
    }

    public function create()
    {
        $paises = Paises::all(); //obtiene la información de la tabla 'paises'.
        $ecivils = Ecivil::all();//obtiene la información de la tabla 'estado civil'.
        $sexos = Sexo::all(); //obtiene la información de la tabla 'sexo'.
        $tiposangres = Tsangre::all(); //obtiene la información de la tabla 'tiposangre'.
        $etnias = Etnia::all(); //obtiene la información de la tabla 'etnia'.
        $persona = new Persona();
        return view('personas.create', compact('persona', 'etnias', 'tiposangres', 'sexos', 'ecivils', 'paises'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'cedula' => 'required|unique:personas|max:10',
        //     'nombres' => 'required|string|max:255',
        //     'apellidos' => 'required|string|max:255',
        //     'fnacimiento' => 'required|date',
        //     'ecivil' => 'required|string',
        //     'genero' => 'required|string',
        //     'tsangre' => 'required|string|exists:tiposangre,id',
        //     'etnia' => 'required|string|exists:etnia,id',
        //     'nacionalidad' => 'required|string',
        // ]);

        Persona::create($request->all());

        return redirect()->route('personas.index')->with('success', 'Persona creada exitosamente');
    }

    public function show($id)
    {   
        $persona = Persona::with('Tsangre', 'sexo', 'ecivil', 'etnia', 'paises')->findOrFail($id);
        return view('personas.show', compact('persona'));
    }

    public function edit($id)
    {
        $paises = Paises::all(); //obtiene la información de la tabla 'paises'.
        $ecivils = Ecivil::all();//obtiene la información de la tabla 'estado civil'.
        $sexos = Sexo::all(); //obtiene la información de la tabla 'sexo'.
        $tiposangres = Tsangre::all(); //obtiene la información de la tabla 'tiposangre'.
        $etnias = Etnia::all(); //obtiene la información de la tabla 'etnia'. 
        $persona = Persona::findOrFail($id);
        return view('personas.edit', compact('persona', 'etnias', 'tiposangres', 'sexos', 'ecivils', 'paises'));
    }

    public function update(Request $request, $id)
    {

        /*
        $request->validate([
            'cedula' => 'required|max:10',
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'fnacimiento' => 'required|date',
            'ecivil' => 'required|string|max:2',
            'genero' => 'required|string|max:10',
            'tsangre' => 'required|string|max:2',
            'etnia' => 'required|string|max:20|exists:tiposangre,id',
            'nacionalidad' => 'required|string|max:50',
        ]);

        
    
        dd($request->all()); // Verifica los datos recibidos*/


        $persona = Persona::findOrFail($id);
        //echo "Valí pipi";
        //Exit();
        $persona->update($request->all());
        //dd($request->all());
        return redirect()->route('personas.index')->with('success', 'Persona actualizada exitosamente.');
    
    }

    public function destroy($id)
    {
        $persona = Persona::findOrFail($id);
        $persona->delete();

        return redirect()->route('personas.index')->with('success', 'Persona eliminada exitosamente');
    }
}
