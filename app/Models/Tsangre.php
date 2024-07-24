<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tsangre extends Model
{
    use HasFactory;
    
    protected $table = 'tiposangre'; // Especifica el nombre de la tabla

    protected $fillable = [
        'nomtsangre'
    ];

    public function persona()
    {
        return $this->hasMany(Persona::class);
    }
}
