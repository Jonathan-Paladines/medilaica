<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PersonasVacunas extends Pivot
{
    protected $table = 'personas_vacunas';

    protected $fillable = [
        'persona_id',
        'vacuna_id',
        'numero_dosis',
        'fecha_vacuna',
        'observacion',
    ];

    public $incrementing = false;

    /**
     * Get the persona that owns the vacuna.
     */
    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    /**
     * Get the vacuna that belongs to the persona.
     */
    public function vacuna()
    {
        return $this->belongsTo(Vacuna::class);
    }
}
