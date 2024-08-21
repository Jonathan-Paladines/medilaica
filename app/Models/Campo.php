<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campo extends Model
{
    protected $table = 'campos';

    protected $fillable = [
        'campo',
    ];

    // Relación uno a muchos con `ConsultaExamenFisico`
    public function examenesFisicos()
    {
        return $this->hasMany(ConsultaExamenFisico::class, 'campos_id');
    }
}
