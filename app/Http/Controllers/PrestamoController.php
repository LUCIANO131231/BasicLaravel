<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Prestamo;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prestamos = Prestamo::with('libro')->get();

        return response()->json([
            'success' => true,
            'data' => $prestamos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'libro_id' => 'required|exists:libros,id',
            'nombre_usuario' => 'required|max:255',
            'email_usuario' => 'required|email|max:255',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'required|date|after:fecha_prestamo',
        ]);

        // Crear el préstamo
        $prestamo = Prestamo::create($request->all());

        // Reducir el stock del libro
        $libro = Libro::find($request->libro_id);
        $libro->stock = $libro->stock - 1;
        $libro->save();

        return response()->json([
            'success' => true,
            'message' => 'Préstamo registrado exitosamente',
            'data' => $prestamo
        ], 201);
    }
}
