<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table = 'carreras';

    protected $fillable = [
        'nombre',
    ];

    //Relación uno a muchos
    public function materias()
    {
        return $this->hasMany(Materia::class);
    }
    
}
