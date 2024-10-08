<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cie10 extends Model
{
    protected $table = 'cie10';
    protected $fillable = ['codigo', 'detalle_cie'];
    
    public function consultaMedica()
    {
        return $this->hasMany(ConsultaMedica::class);
    }
}

