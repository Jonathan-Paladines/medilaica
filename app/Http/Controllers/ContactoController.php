<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index()
    {
        $contactos = Contacto::all();
        return view('contactos.index', compact('contactos'));
    }

    public function create()
    {
        return view('contactos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_contacto' => 'required',
            'telefono_movil' => 'required',
            'otro_telefono' => 'nullable',
            'parentezco' => 'required',
        ]);

        Contacto::create($request->all());
        return redirect()->route('contactos.index');
    }

    public function show($id)
    {
        $contacto = Contacto::with('nombre_contacto','telefono_movil','otro_telefono','parentezco')->findOrFail($id);
        return view('contactos.show', compact('contacto'));
    }

    public function edit(Contacto $contacto)
    {
        return view('contactos.edit', compact('contacto'));
    }

    public function update(Request $request, Contacto $contacto)
    {
        $request->validate([
            'nombre_contacto' => 'required',
            'telefono_movil' => 'required',
            'otro_telefono' => 'nullable',
            'parentezco' => 'required',
        ]);

        $contacto->update($request->all());
        return redirect()->route('contactos.index');
    }

    public function destroy(Contacto $contacto)
    {
        $contacto->delete();
        return redirect()->route('contactos.index');
    }
}
