<?php

namespace App\Http\Controllers;

use App\Models\Alergia;
use App\Models\TipoAlergia;
use Illuminate\Http\Request;

class AlergiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alergias = Alergia::with('tipoAlergia')->get();
        return view('alergias.index', compact('alergias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipoAlergias = TipoAlergia::all();
        return view('alergias.create', compact('tipoAlergias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //$request->validate([
        //    'nombrealergia' => 'required',
        //    'id_tipoalergias' => 'required|exists:tipoalergias,id',
        //]);

        //$alergias = Alergia::create();
        //$alergias ->tipoalergias()->associate($tipoalergias);
        //$alergias ->save();

        Alergia::create($request->only('nombrealergia', 'id_tipoalergias'));

        return redirect()->route('alergias.index')->with('success', 'Alergia se ingresó exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $alergia = Alergia::with('tipoAlergia')->findOrFail($id);
        return view('alergias.show', compact('alergia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $alergia = Alergia::findOrFail($id);
        $tipoAlergias = TipoAlergia::all();
        return view('alergias.edit', compact('alergia', 'tipoAlergias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombrealergia' => 'required',
            'id_tipoalergias' => 'required|exists:tipoalergias,id',
        ]);

        $alergia = Alergia::findOrFail($id);
        $alergia->update($request->only('nombrealergia', 'id_tipoalergias'));

        return redirect()->route('alergias.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $alergia = Alergia::findOrFail($id);
        $alergia->delete();

        return redirect()->route('alergias.index');
    }
}
