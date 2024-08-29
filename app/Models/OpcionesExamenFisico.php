<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpcionesExamenFisico extends Model
{
    protected $table = 'opciones_examen_fisico';
    protected $fillable = ['campo'];
    
    public function regiones()
    {
        return $this->belongsToMany(RegionesDelCuerpo::class, 'rcuerpo_oef', 'campo_id', 'tcampo_id');
    }
}

