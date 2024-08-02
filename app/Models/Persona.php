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
        return $this->belongsToMany(Alergia::class, 'personas_alergias')->using(PersonaAlergia::class);
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

        public function habitos()
    {
        return $this->belongsToMany(Habitos::class, 'persona_habitos', 'persona_id', 'habitos_id')->withTimestamps();
    }

    public function personalAntecedentes()
    {
        return $this->belongsToMany(PersonalAntecedentes::class, 'personas_antecedentes', 'persona_id', 'personal_antecedente_id')
                    ->withTimestamps();
    }

    public function familiaresAntecedentes()
    {
        return $this->belongsToMany(FamiliaresAntecedentes::class, 'personas_afamiliares', 'persona_id', 'familiares_antecedente_id')->withTimestamps();
    }

    public function quirurgicosAntecedentes()
    {
        return $this->belongsToMany(QuirurgicosAntecedentes::class, 'personas_aquirurgicos', 'persona_id', 'quirurgicos_antecedente_id')->withTimestamps();;
    }
    
}

