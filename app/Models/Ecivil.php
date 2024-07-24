<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecivil extends Model
{
    use HasFactory;

    protected $table = 'ecivils'; // Especifica el nombre de la tabla

    protected $fillable = [
        'estadocivil'
    ];

    public function persona()
    {
        return $this->hasMany(Persona::class);
    }
}
