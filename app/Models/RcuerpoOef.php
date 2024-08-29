<?php

namespace App\Models;

use App\Models\RegionesDelCuerpo;
use App\Models\OpcionesExamenFisico;
use Illuminate\Database\Eloquent\Model;

class RcuerpoOef extends Model
{
    protected $table = 'rcuerpo_oef';
    protected $fillable = ['tcampo_id','campo_id'];
    
    public function detalleExamenFisico()
    {
        return $this->hasMany(DetalleExamenFisico::class);
    }

    public function region()
    {
        return $this->belongsTo(RegionesDelCuerpo::class, 'tcampo_id');
    }

    public function opcionExamenFisico()
    {
        return $this->belongsTo(OpcionesExamenFisico::class, 'campo_id');
    }
}

