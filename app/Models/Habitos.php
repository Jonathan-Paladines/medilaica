<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitos extends Model
{
    use HasFactory;

    protected $table = 'habitos'; // Especifica el nombre de la tabla

    protected $fillable = [
        'habitos'
    ];

}
