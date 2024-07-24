<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PersonasContactos extends Pivot
{
    protected $table = 'personas_contactos';

    protected $fillable = [
        'persona_id',
        'contacto_id',
    ];

    public $incrementing = false;

    /**
     * Get the persona that owns the contacto.
     */
    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    /**
     * Get the contacto that belongs to the persona.
     */
    public function contacto()
    {
        return $this->belongsTo(Contacto::class);
    }
}
