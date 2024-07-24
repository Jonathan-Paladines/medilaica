<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;

    protected $table = 'contactos'; // Especifica el nombre de la tabla.

    protected $fillable = [
        'nombre_contacto','telefono_movil','otro_telefono','parentezco',
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class); // Relación uno a muchos con la tabla personas.
    }

    public function personas()
    {
        return $this->belongsToMany(Persona::class, 'personas_contactos')->using(PersonasContactos::class);
    }
    
}
