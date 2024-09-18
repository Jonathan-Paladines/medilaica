<?php

namespace App\Http\Controllers;

use App\Models\Nurse;
use App\Models\Role;
use Illuminate\Http\Request;

class NurseController extends Controller
{
    public function index()
    {
        $nurses = Nurse::with('role')->get();
        return view('nurses.index', compact('nurses'));
    }

    public function create()
    {
        $roles = Role::where('nombre', 'enfermera')->get();
        return view('nurses.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cedula' => 'required|string|max:20|unique:nurses',
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'correo' => 'required|email|max:255|unique:nurses',
            'telefono' => 'required|string|max:20',
            'foto' => 'nullable|image|max:2048',
            'role_id' => 'required|exists:roles,id',
        ]);

        if ($request->hasFile('foto')) {
            $filePath = $request->file('foto')->store('nurses', 'public');
            $validatedData['foto'] = $filePath;
        }

        #Nurse::create($data);
        Nurse::create($validatedData);
        return redirect()->route('nurses.index');
    }

    public function edit(Nurse $nurse)
    {
        $roles = Role::where('nombre', 'enfermera')->get();
        return view('nurses.edit', compact('nurse', 'roles'));
    }

    public function update(Request $request, Nurse $nurse)
    {
        $request->validate([
            'cedula' => 'required|string|max:20|unique:nurses,cedula,'.$nurse->id,
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'correo' => 'required|email|max:255|unique:nurses,correo,'.$nurse->id,
            'telefono' => 'required|string|max:20',
            'foto' => 'nullable|image|max:2048',
            'role_id' => 'required|exists:roles,id',
        ]);

        $data = $request->all();
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('nurses');
        }

        $nurse->update($data);
        return redirect()->route('nurses.index');
    }

    public function destroy(Nurse $nurse)
    {
        $nurse->delete();
        return redirect()->route('nurses.index');
    }

        public function show(Nurse $nurse)
    {
        return view('nurses.show', compact('nurse'));
    }
}
