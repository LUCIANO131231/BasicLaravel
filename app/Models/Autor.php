<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $table = 'autores';

    protected $fillable = [
        'nombres',
        'apellidos',
        'biografia',
        'fecha_nacimiento'
    ];

    //relacion un autor tiene muchos libros
    public function libro() {
        return $this->hasMany(Libro::class);
    }
}
