<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoAlergia extends Model
{
    use HasFactory;

    protected $fillable = ['tipoalergia'];

    protected $table = 'tipoalergias';  // Asegúrate de que el nombre de la tabla es correcto
    
    public function alergias()
    {
        return $this->hasMany(Alergia::class, 'id_tipoalergias');
    }
}
