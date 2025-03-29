<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $autores = Autor::all();

        return response()->json([
            'success' => true,
            'data' => $autores
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|max:255',
            'apellidos' => 'required|max:255',
        ]);

        $autor = Autor::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Autor creado exitosamente',
            'data' => $autor
        ], 201);
    }
}
