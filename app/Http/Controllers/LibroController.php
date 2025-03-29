<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Categoria;
use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Libro::with(['autor', 'categoria'])->get();
        return response()->json([
            'success' => true,
            'data' => $libros
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'codigo' => 'required|max:20|unique:libros',
            'paginas' => 'required|integer|min:1',
            'anio_publicacion' => 'required|integer|min:1800|max:' . date('Y'),
            'autor_id' => 'required|exists:autores,id',
            'categoria_id' => 'required|exists:categorias,id',
            'stock' => 'required|integer|min:0'
        ]);

        $libro = Libro::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Libro creado exitosamente',
            'data' => $libro
        ], 201);
    }
}
