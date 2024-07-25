<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PersonaAlergia extends Pivot
{
    protected $table = 'personas_alergias';

    protected $fillable = [
        'persona_id',
        'alergia_id',
    ];

    public $incrementing = false;

    /**
     * Get the persona that owns the alergia.
     */
    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    /**
     * Get the alergia that belongs to the persona.
     */
    public function alergia()
    {
        return $this->belongsTo(Alergia::class);
    }
}
