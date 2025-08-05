<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $fillable = [
        'usuario_id',
        'nombre',
        'apellidos',
        'dni',
        'fecha_nacimiento',
        'telefono',
        'direccion',
        'especialidad',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function formaciones()
    {
        return $this->hasMany(DocenteFormacion::class);
    }
}
