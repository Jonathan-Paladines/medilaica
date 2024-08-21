<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultaMedica extends Model
{
    protected $table = 'consulta_medica';

    protected $fillable = [
        'motivo_de_consulta',
        'enfermedad_actual',
        'tratamiento',
    ];

    // Relación uno a muchos con `ConsultaExamenFisico`
    public function examenesFisicos()
    {
        return $this->hasMany(ConsultaExamenFisico::class, 'consulta_medica_id','enfermedad_actual','tratamiento');
    }
}
