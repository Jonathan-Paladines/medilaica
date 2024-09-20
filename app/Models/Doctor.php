<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'cedula', 
        'nombres', 
        'apellidos', 
        'genero', 
        'correo', 
        'telefono', 
        'foto', 
        'role_id'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
