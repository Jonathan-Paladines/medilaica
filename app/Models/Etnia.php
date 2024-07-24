<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etnia extends Model
{
    use HasFactory;

    protected $table = 'etnia'; // Especifica el nombre de la tabla

    protected $fillable = [
        'nometnia'
    ];

    public function persona()
    {
        return $this->hasMany(Persona::class);
    }
}
