<?php

namespace App\Http\Controllers;
use App\Models\Agente;
use App\Models\Categoria;
use App\Models\Propiedad;

use Illuminate\Http\Request;

class AgenteController extends Controller
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
        $agentes = Agente::all();
        return view('agentes.createAgente');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
        ]);
    
        Agente::create($request->all());
    
        return redirect()->route('agentes.index')->with('success', 'Agente creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $agentes = Agente::findOrFail($id);
        return view('show', compact('agentes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $agente = Agente::findOrFail($id);
        return view('agentes.editAgente', compact('agente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $agente = Agente::findOrFail($id);
        
        $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
        ]);
    
        $agente->update($request->all());
    
        return redirect()->route('agentes.index')->with('success', 'Agente actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $agente = Agente::findOrFail($id);
        $agente->delete();
    
        return redirect()->route('agentes.index')->with('success', 'Agente eliminado exitosamente');
    }
}
