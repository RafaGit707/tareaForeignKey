<?php

namespace App\Http\Controllers;
use App\Models\Agente;
use App\Models\Categoria;
use App\Models\Propiedad;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $propiedades = Propiedad::all();
        $categorias = Categoria::all();
        $agentes = Agente::all();
        return view('index', compact('agentes', 'categorias', 'propiedades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.createCategoria');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);
    
        Categoria::create($request->all());
    
        return redirect()->route('categorias.index')->with('success', 'Categoria creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categorias.editCategoria', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);
    
        $categoria->update($request->all());
    
        return redirect()->route('categorias.index')->with('success', 'Categoria actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
    
        return redirect()->route('categorias.index')->with('success', 'Categoria eliminado exitosamente');
    }
}
