<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalAntecedentes extends Model
{
    use HasFactory;

    protected $table = 'personal_antecedentes'; // Especifica el nombre de la tabla

    protected $fillable = [
        'anteper'
    ];

    public function personas()
    {
        return $this->belongsToMany(Persona::class, 'personas_antecedentes', 'personal_antecedente_id', 'persona_id')
                    ->withTimestamps();
    }

}
