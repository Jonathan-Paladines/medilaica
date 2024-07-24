<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosAcademicos extends Model
{
    use HasFactory;

    protected $fillable = [
        'persona_id', 'lugartrabajo', 'profesion', 'facultad', 'carrera', 'nivel', 'tipo'
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
}
