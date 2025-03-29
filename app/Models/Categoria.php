<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion'
    ];

    //relacion de categoria tiene muchos libros
    public function libros() {
        return $this->hasMany(Libro::class);
    }
}
