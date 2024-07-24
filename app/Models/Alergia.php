<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alergia extends Model
{
    use HasFactory;

    protected $fillable = ['nombrealergia', 'id_tipoalergias'];

    public function tipoAlergia()
    {
        return $this->belongsTo(TipoAlergia::class, 'id_tipoalergias');
    }

    public function personas()
    {
        return $this->belongsToMany(Persona::class, 'personas_alergias')->using(PersonasAlergias::class);
    }
}
