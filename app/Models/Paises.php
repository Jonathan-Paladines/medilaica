<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paises extends Model
{
    use HasFactory;

    protected $table = 'paises'; // Especifica el nombre de la tabla

    protected $fillable = [
        'iso','mompais','nacionalidad'
    ];

    public function persona()
    {
        return $this->hasMany(Persona::class);
    }

}
