<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuirurgicosAntecedentes extends Model
{
    use HasFactory;

    protected $table = 'quirurgicos_antecedentes'; // Especifica el nombre de la tabla

    protected $fillable = [
        'antequi'
    ];

    public function personas()
    {
        return $this->belongsToMany(Persona::class, 'personas_aquirurgicos_antecedentes');
    }

}
