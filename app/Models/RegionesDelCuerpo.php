<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegionesDelCuerpo extends Model
{
    protected $table = 'regiones_del_cuerpo';
    protected $fillable = ['tipo'];
    
    public function opciones()
    {
        return $this->belongsToMany(OpcionesExamenFisico::class, 'rcuerpo_oef', 'tcampo_id', 'campo_id');
    }
    public function mostrarNombre(){
        return $this->belongsTo(RegionesDelCuerpo::class, 'tipo');
    }
}
