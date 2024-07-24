<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $fillable = [
        'cedula', 
        'nombres', 
        'apellidos', 
        'fnacimiento', 
        'ecivil', 
        'genero', 
        'tsangre', 
        'etnia', 
        'nacionalidad',
        'telefono1',
        'telefono2',
        'correo1',
        'correo2',
        'pais_residencia',
        'provincia_residencia',
        'ciudad_residencia',
        'domicilio'

    ];

    public function residencia()
    {
        return $this->hasOne(Residencia::class);
    }

    public function datosAcademicos()
    {
        return $this->hasOne(DatosAcademicos::class);
    }

    public function etnia()
    {
        return $this->belongsTo(Etnia::class, 'etnia_id');
    }

    public function tsangre()
    {
        return $this->belongsTo(Tsangre::class, 'tiposangre_id');
    }

    public function sexo()
    {
        return $this->belongsTo(Sexo::class, 'sexos_id');
    }

    public function ecivil()
    {
        return $this->belongsTo(Ecivil::class, 'ecivils_id');
    }

    public function paises()
    {
        return $this->belongsTo(Paises::class, 'paises_id');
    }

    public function alergias()
    {
        return $this->belongsToMany(Alergia::class, 'personas_alergias')->using(PersonasAlergias::class);
    }

    public function contactos()
    {
        return $this->belongsToMany(Contacto::class, 'personas_contactos')->using(PersonasContactos::class);
    }

    public function vacunas()
    {
        return $this->belongsToMany(Vacuna::class, 'personas_vacunas')
                    ->using(PersonasVacunas::class)
                    ->withPivot('numero_dosis', 'fecha_vacuna', 'observacion');
    }
    
}

