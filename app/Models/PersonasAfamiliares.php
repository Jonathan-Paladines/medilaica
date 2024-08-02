<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonasAfamiliares extends Model
{
    use HasFactory;

    protected $table = 'personas_afamiliares';

    protected $fillable = [
        'persona_id',
        'familiares_antecedente_id',
    ];
}
