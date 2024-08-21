<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultaExamenFisico extends Model
{
    protected $table = 'consulta_examen_fisico';

    protected $fillable = [
        'consulta_medica_id',
        'campos_id',
        'resultados_id',
    ];

    // Relación inversa con `ConsultaMedica`
    public function consultaMedica()
    {
        return $this->belongsTo(ConsultaMedica::class, 'consulta_medica_id');
    }

    // Relación inversa con `Campo`
    public function campo()
    {
        return $this->belongsTo(Campo::class, 'campos_id');
    }

    // Relación inversa con `Resultado`
    public function resultado()
    {
        return $this->belongsTo(Resultado::class, 'resultados_id');
    }
}
