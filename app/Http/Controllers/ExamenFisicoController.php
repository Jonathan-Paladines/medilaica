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
    public function index($personaId)
    {
        $persona = Persona::findOrFail($personaId);
        $examenesAgrupados = ExamenFisico::with('detalle.rcuerpoOef.region', 'detalle.rcuerpoOef.opcionExamenFisico')
            ->where('persona_id', $personaId)
            ->get()
            ->groupBy('observacion');
    
        return view('examen_fisico.index', compact('personaId', 'examenesAgrupados'));
    }

    public function create($personaId)
    {
        $arrayDetalles = [];
        $detalles = DetalleExamenFisico::with('rcuerpoOef.region', 'rcuerpoOef.opcionExamenFisico')->get();

        foreach ($detalles as $detalle) {
            $arrayDetalles[] = [
                'id' => $detalle->id,
                'tipo' => $detalle->rcuerpoOef->region->tipo ?? 'N/A',
                'campo' => $detalle->rcuerpoOef->opcionExamenFisico->campo ?? 'N/A'
            ];
        }

        return view('examen_fisico.create', compact('arrayDetalles', 'detalles', 'personaId'));
    }

    public function store(Request $request, $personaId)
    {
        $request->validate([
            'detalle_examen_fisico_id' => 'required|array',
            'observacion' => 'required|string',
        ]);

        foreach ($request->detalle_examen_fisico_id as $detalle_id) {
            ExamenFisico::create([
                'detalle_examen_fisico_id' => $detalle_id,
                'observacion' => $request->observacion,
                'persona_id' => $personaId,
            ]);
        }

        return redirect()->route('examen_fisico.index', ['personaId' => $personaId])
            ->with('success', 'Examen Físico creado exitosamente.');
    }

    public function show($personaId, $id)
    {
        $persona = Persona::findOrFail($personaId);
        $examenFisico = ExamenFisico::where('id', $id)
            ->where('persona_id', $personaId)
            ->with('detalle.rcuerpoOef.region', 'detalle.rcuerpoOef.opcionExamenFisico')
            ->firstOrFail();

        return view('examen_fisico.show', compact('examenFisico', 'personaId'));
    }

    public function edit($personaId, $id)
    {
        $examenFisico = ExamenFisico::where('id', $id)
            ->where('persona_id', $personaId)
            ->firstOrFail();
        
        $detalles = DetalleExamenFisico::all();
        return view('examen_fisico.edit', compact('examenFisico', 'detalles', 'personaId'));
    }

    public function update(Request $request, $personaId, $id)
    {
        $request->validate([
            'detalle_examen_fisico_id' => 'required',
            'observacion' => 'required|string',
        ]);

        $examenFisico = ExamenFisico::where('id', $id)
            ->where('persona_id', $personaId)
            ->firstOrFail();

        $examenFisico->update([
            'detalle_examen_fisico_id' => $request->detalle_examen_fisico_id,
            'observacion' => $request->observacion,
        ]);

        return redirect()->route('examen_fisico.index', ['personaId' => $personaId])
            ->with('success', 'Examen Físico actualizado exitosamente.');
    }

    public function destroy($personaId, $id)
    {
        $examenFisico = ExamenFisico::where('id', $id)
            ->where('persona_id', $personaId)
            ->firstOrFail();

        $examenFisico->delete();

        return redirect()->route('examen_fisico.index', ['personaId' => $personaId])
            ->with('success', 'Examen Físico eliminado exitosamente.');
    }

    public function obtenerNomTipo($regionCuerpo_id)
    {
        $regionCuerpo = RegionesDelCuerpo::findOrFail($regionCuerpo_id);
        return $regionCuerpo->tipo;
    }
}
