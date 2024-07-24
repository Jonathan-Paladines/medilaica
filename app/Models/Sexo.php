<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    use HasFactory;

    protected $table = 'sexos'; // Especifica el nombre de la tabla

    protected $fillable = [
        'nomsexo'
    ];

    public function persona()
    {
        return $this->hasMany(Persona::class);
    }

}
