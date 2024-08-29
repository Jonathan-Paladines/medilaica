<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultaMedica extends Model
{
    protected $table = 'consulta_medica';
    
    public function examenFisico()
    {
        return $this->belongsTo(ExamenFisico::class);
    }
    
    public function cie10()
    {
        return $this->belongsTo(Cie10::class);
    }
    
    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
}

