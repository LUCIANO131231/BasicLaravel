<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $fillable = [
        'libro_id',
        'nombre_usuario',
        'email_usuario',
        'fecha_prestamo',
        'fecha_devolucion',
        'devuelto'
    ];

    //un prestamo pertenece a un libro
    public function libro() {
        return $this->belongsTo(Libro::class);
    }
}
