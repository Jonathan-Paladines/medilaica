<?php

namespace App\Http\Controllers;

use App\Models\TipoAlergia;
use Illuminate\Http\Request;

class TipoAlergiaController extends Controller
{
    public function index()
    {
        $tipoAlergias = TipoAlergia::all();
        return view('tipoalergias.index', compact('tipoAlergias'));
    }

    public function create()
    {
        return view('tipoalergias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipoalergia' => 'required',
        ]);

        TipoAlergia::create($request->only('tipoalergia'));

        return redirect()->route('tipoalergias.index');
    }

    public function show($id)
    {
        $tipoAlergia = TipoAlergia::findOrFail($id);
        return view('tipoalergias.show', compact('tipoAlergia'));
    }

    public function edit($id)
    {
        $tipoAlergia = TipoAlergia::findOrFail($id);
        return view('tipoalergias.edit', compact('tipoAlergia'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tipoalergia' => 'required',
        ]);

        $tipoAlergia = TipoAlergia::findOrFail($id);
        $tipoAlergia->update($request->only('tipoalergia'));

        return redirect()->route('tipoalergias.index');
    }

    public function destroy($id)
    {
        $tipoAlergia = TipoAlergia::findOrFail($id);
        $tipoAlergia->delete();

        return redirect()->route('tipoalergias.index');
    }
}
