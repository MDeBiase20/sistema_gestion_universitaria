<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocenteFormacion extends Model
{
    protected $fillable = [
        'docente_id',
        'titulo',
        'institucion',
        'fecha_fin',
        'descripcion',
    ];

    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }
}
