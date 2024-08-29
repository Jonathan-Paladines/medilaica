<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleExamenFisico extends Model
{
    protected $table = 'detalle_examen_fisico';
    protected $fillable = ['rcuerpo_oef_id','estado'];
    
    public function rcuerpoOef()
    {
        return $this->belongsTo(RcuerpoOef::class, 'rcuerpo_oef_id');
    }
    
    public function examenFisico()
    {
        return $this->hasOne(ExamenFisico::class);
    }
}

