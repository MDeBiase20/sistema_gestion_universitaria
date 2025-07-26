<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrativo extends Model
{
    protected $table = 'administrativos';

    protected $fillable = [
        'usuario_id',
        'nombre',
        'apellido',
        'dni',
        'fecha_nacimiento',
        'telefono',
        'direccion',
        'cargo',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

}
