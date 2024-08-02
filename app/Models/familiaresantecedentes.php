<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamiliaresAntecedentes extends Model
{
    use HasFactory;

    protected $table = 'familiares_antecedentes'; // Especifica el nombre de la tabla

    protected $fillable = [
        'antefam',
    ];

    public function personas()
    {
        return $this->belongsToMany(Persona::class, 'personas_afamiliares', 'familiares_antecedente_id', 'persona_id')->withTimestamps();
    }

}
