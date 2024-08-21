<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    protected $table = 'resultados';

    protected $fillable = [
        'detalle',
    ];

    // Relación uno a muchos con `ConsultaExamenFisico`
    public function examenesFisicos()
    {
        return $this->hasMany(ConsultaExamenFisico::class, 'resultados_id');
    }
}
