<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamenFisico extends Model
{
    protected $table = 'examen_fisico';
    protected $fillable = ['detalle_examen_fisico_id','observacion'];
    
    public function detalle()
    {
        return $this->belongsTo(DetalleExamenFisico::class, 'detalle_examen_fisico_id');
    }
    
    public function consultaMedica()
    {
        return $this->hasOne(ConsultaMedica::class);
    }
}

