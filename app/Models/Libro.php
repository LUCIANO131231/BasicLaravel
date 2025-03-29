<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = [
        'titulo',
        'descripcion',
        'codigo',
        'paginas',
        'anio_publicacion',
        'autor_id',
        'categoria_id',
        'stock'
    ];

    //un libro tiene un autor
    public function autor() {
        return $this->belongsTo(Autor::class);
    }

    //un libro tiene un categoria
    public function categoria() {
        return $this->belongsTo(Categoria::class);
    }

    //un libro tiene muchos prestamos
    public function prestamos() {
        return $this->hasMany(Prestamo::class);
    }
}
