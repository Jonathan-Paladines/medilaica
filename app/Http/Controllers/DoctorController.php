<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Role;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return view('doctors.index', compact('doctors'));
    }

    public function create()
    {
        $roles = Role::where('nombre', 'doctor')->get(); // Seleccionar solo roles de doctor
        return view('doctors.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cedula' => 'required|unique:doctors,cedula',
            'nombres' => 'required',
            'apellidos' => 'required',
            'genero' => 'required',
            'correo' => 'required|email|unique:doctors,correo',
            'telefono' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'role_id' => 'required|exists:roles,id',
        ]);

        if ($request->hasFile('foto')) {
            $filePath = $request->file('foto')->store('doctors', 'public');
            $validatedData['foto'] = $filePath;
        }

        Doctor::create($validatedData);

        return redirect()->route('doctors.index')->with('success', 'Doctor agregado correctamente.');
    }

    public function show(Doctor $doctor)
    {
        return view('doctors.show', compact('doctor'));
    }

    public function edit(Doctor $doctor)
    {
        $roles = Role::where('nombre', 'doctor')->get();
        return view('doctors.edit', compact('doctor', 'roles'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $validatedData = $request->validate([
            'cedula' => 'required|unique:doctors,cedula,'.$doctor->id,
            'nombres' => 'required',
            'apellidos' => 'required',
            'genero' => 'required',
            'correo' => 'required|email|unique:doctors,correo,'.$doctor->id,
            'telefono' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'role_id' => 'required|exists:roles,id',
        ]);

        if ($request->hasFile('foto')) {
            $filePath = $request->file('foto')->store('doctors', 'public');
            $validatedData['foto'] = $filePath;
        }

        $doctor->update($validatedData);

        return redirect()->route('doctors.index')->with('success', 'Doctor actualizado correctamente.');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctors.index')->with('success', 'Doctor eliminado correctamente.');
    }
}

