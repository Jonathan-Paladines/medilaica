<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vacuna extends Model
{
    use HasFactory;

    protected $table = 'vacunas'; // Especifica el nombre de la tabla

    protected $fillable = [
        'vacuna',
    ];

    public function persona()
    {
        return $this->hasMany(Persona::class);
    }

    public function personas()
    {
        return $this->belongsToMany(Persona::class, 'personas_vacunas')
                    ->using(PersonasVacunas::class)
                    ->withPivot('numero_dosis', 'fecha_vacuna', 'observacion');
    }
}

