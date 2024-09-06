<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\ExamenFisico;
use App\Models\DetalleExamenFisico;
use App\Models\OpcionesExamenFisico;
use App\Models\RcuerpoOef;
use App\Models\RegionesDelCuerpo;
use Illuminate\Http\Request;

class ExamenFisicoController extends Controller
{
    public function index()
    {
        $examenesAgrupados = ExamenFisico::with('detalle.rcuerpoOef.region', 'detalle.rcuerpoOef.opcionExamenFisico')
        ->get()
        ->groupBy('observacion');
    
        return view('examen_fisico.index', compact('examenesAgrupados'));
    }

    public function create($personaId)
    {
        $arrayDetalles = array();
        $detalles = DetalleExamenFisico::all();
        $i = 0;
        foreach ($detalles as $detalle){
            $rcuerpooef = RcuerpoOef::findOrFail($detalle->rcuerpo_oef_id);
            $rcuerpo = RegionesDelCuerpo::findOrFail($rcuerpooef->tcampo_id);
            $opcionexamen = OpcionesExamenFisico::findOrFail($rcuerpooef->campo_id);
            $arrayDetalles[$i]['id']=$detalle->id;
            $arrayDetalles[$i]['tipo']=$rcuerpo->tipo;
            $arrayDetalles[$i]['campo']=$opcionexamen->campo;
            $i++;
        }
        //$regiones = RegionesDelCuerpo::all();
        //var_dump($arrayDetalles);
        //exit (0);
        return view('examen_fisico.create', compact('arrayDetalles', 'personaId'));
    }

    public function store(Request $request, $personaId)
    {
        //var_dump($personaId);
        //exit(0);
        // $request->validate([
        //     'detalle_examen_fisico_id' => 'required|array',
        //     'observacion' => 'required|string',
        //     'persona_id' => 'required|exists:personas,id',
        // ]);
        $persona = Persona::findOrFail($personaId);
        foreach ($request->detalle_examen_fisico_id as $detalle_id) {
            ExamenFisico::create([
                'detalle_examen_fisico_id' => $detalle_id,
                'observacion' => $request->observacion,
                'persona_id' => $request-> $persona,
            ]);
        }

        return redirect()->route('examen_fisico.index')->with('success', 'Examen Físico creado exitosamente.');
    }

    public function show($id)
    {
        //$examenFisico = ExamenFisico::with('detalle')->findOrFail($id);
        //return view('examen_fisico.show', compact('examenFisico'));

        $examenFisicoDetalles = ExamenFisico::where('id', $id)
        ->with('detalle.rcuerpoOef.region', 'detalle.rcuerpoOef.opcionExamenFisico')
        ->get();
    
    return view('examen_fisico.show', compact('examenFisicoDetalles'));

    }

    public function edit($id)
    {
        $examenFisico = ExamenFisico::findOrFail($id);
        $detalles = DetalleExamenFisico::all();
        return view('examen_fisico.edit', compact('examenFisico', 'detalles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'detalle_examen_fisico_id' => 'required',
            'observacion' => 'required|string',
        ]);

        $examenFisico = ExamenFisico::findOrFail($id);
        $examenFisico->update($request->all());

        return redirect()->route('examen_fisico.index')->with('success', 'Examen Físico actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $examenFisico = ExamenFisico::findOrFail($id);
        $examenFisico->delete();

        return redirect()->route('examen_fisico.index')->with('success', 'Examen Físico eliminado exitosamente.');
    }

public function obtenerNomTipo($regionCuerpo_id)
{
    $regionCuerpo = RegionesDelCuerpo::findOrFail($regionCuerpo_id);

}

}
