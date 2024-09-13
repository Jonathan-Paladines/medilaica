<?php

namespace App\Http\Controllers;

use App\Models\ConsultaMedica;
use App\Models\Persona;
use App\Models\DetalleExamenFisico;
use App\Models\ExamenFisico;
use App\Models\OpcionesExamenFisico;
use App\Models\RcuerpoOef;
use App\Models\RegionesDelCuerpo;
use App\Models\Cie10;
use Illuminate\Http\Request;

class ConsultaMedicaController extends Controller
{
    public function index()
    {
        $consultas = ConsultaMedica::all();
        return view('consulta_medica.index', compact('consultas'));
    }

    public function create($personaId)
    {
        $persona = Persona::findOrFail($personaId);
        $examenes_fisicos = ExamenFisico::all();
        $examenesAgrupados = ExamenFisico::with('detalle.rcuerpoOef.region', 'detalle.rcuerpoOef.opcionExamenFisico')
            ->get()
            ->groupBy('observacion');
        $cie10 = Cie10::all();
    
        $detalles = DetalleExamenFisico::all();
        $rcuerpooefs = RcuerpoOef::whereIn('id', $detalles->pluck('rcuerpo_oef_id'))->get();
        $regiones = RegionesDelCuerpo::whereIn('id', $rcuerpooefs->pluck('tcampo_id'))->get();
        $opcionesExamenes = OpcionesExamenFisico::whereIn('id', $rcuerpooefs->pluck('campo_id'))->get();
    
        $arrayDetalles = [];
        foreach ($detalles as $detalle) {
            $rcuerpooef = $rcuerpooefs->where('id', $detalle->rcuerpo_oef_id)->first();
            $rcuerpo = $regiones->where('id', $rcuerpooef->tcampo_id)->first();
            $opcionexamen = $opcionesExamenes->where('id', $rcuerpooef->campo_id)->first();
            $arrayDetalles[] = [
                'id' => $detalle->id,
                'tipo' => $rcuerpo->tipo,
                'campo' => $opcionexamen->campo
            ];
        }
    
        $consultaMedica = new ConsultaMedica();
        return view('consulta_medica.create', compact('persona', 'examenes_fisicos', 'cie10', 'examenesAgrupados', 'consultaMedica', 'arrayDetalles', 'personaId'));
    }

    public function store(Request $request)
    {
        $consulta = new ConsultaMedica();
        //$consulta->paciente_id = $request->paciente_id;
        $consulta->examen_fisico_id = $request->examen_fisico_id;
        $consulta->motivo_consulta = $request->motivo_consulta;
        $consulta->enfermedad_actual = $request->enfermedad_actual;
        $consulta->cie10_id = $request->cie10_id;
        $consulta->tratamiento = $request->tratamiento;
        $consulta->observaciones = $request->observaciones;
        $consulta->save();
    
        // Guardar los detalles del examen físico seleccionados
        $consulta->detalles()->attach($request->detalles);

        foreach ($request->detalle_examen_fisico_id as $detalle_id) {
            ExamenFisico::create([
                'detalle_examen_fisico_id' => $detalle_id,
                'observacion' => $request->observacion,
                'consulta_medica_id' => $request->consulta_medica_id // Relacionar con la consulta médica
            ]);
        }
    
        return redirect()->route('consulta_medica.index')->with('success', 'Consulta médica creada con éxito.');
    }

    public function show(ConsultaMedica $consultaMedica)
    {
        return view('consulta_medica.show', compact('consultaMedica'));
    }

    public function edit(ConsultaMedica $consultaMedica)
    {
        return view('consulta_medica.edit', compact('consultaMedica'));
    }

    public function update(Request $request, ConsultaMedica $consultaMedica)
    {
        $request->validate([
            'persona_id' => 'required|integer',
            'cie10_id' => 'required|integer',
            'detalles' => 'required|string|max:255',
        ]);

        $consultaMedica->update($request->all());
        return redirect()->route('consulta-medica.index')->with('success', 'Consulta médica actualizada con éxito.');
    }

    public function destroy(ConsultaMedica $consultaMedica)
    {
        $consultaMedica->delete();
        return redirect()->route('consulta-medica.index')->with('success', 'Consulta médica eliminada con éxito.');
    }
}
