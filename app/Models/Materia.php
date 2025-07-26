<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table = 'materias';

    protected $fillable = [
        'carrera_id',
        'nombre',
        'codigo',
    ];


    // Relación muchos a uno
    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }
    
}
