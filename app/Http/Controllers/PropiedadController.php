<?php

namespace App\Http\Controllers;
use App\Models\Propiedad;
use App\Models\Agente;
use App\Models\Categoria;

use Illuminate\Http\Request;

class PropiedadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Propiedad::query();
    
        if ($request->has('categoria_id')) {
            $query->where('categoria_id', $request->input('categoria_id'));
        }
    
        if ($request->has('agente_id')) {
            $query->where('agente_id', $request->input('agente_id'));
        }
    
        $propiedades = $query->with('categoria', 'agente')->get();
        $categorias = Categoria::all();
        $agentes = Agente::all();
    
        return view('index', compact('propiedades', 'categorias', 'agentes'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        $agentes = Agente::all();
        return view('propiedades.createPropiedades', compact('categorias', 'agentes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'categoria_id' => 'required|exists:categorias,id',
            'agente_id' => 'required|exists:agentes,id'
        ]);

        Propiedad::create($request->all());

        return redirect()->route('propiedades.index')->with('success', 'Propiedad creada correctamente');
    }  

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $propiedad = Propiedad::findOrFail($id);
        return view('show', compact('propiedad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categorias = Categoria::all();
        $agentes = Agente::all();
        $propiedad = Propiedad::findOrFail($id);
        return view('propiedades.editPropiedades', compact('propiedad', 'categorias', 'agentes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $propiedad = Propiedad::findOrFail($id);
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'categoria_id' => 'required|exists:categorias,id',
            'agente_id' => 'required|exists:agentes,id'
        ]);

        $propiedad->update($request->all());

        return redirect()->route('propiedades.index')->with('success', 'Propiedad actualizada correctamente');
    }   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $propiedad = Propiedad::findOrFail($id);
        $propiedad->delete();

        return redirect()->route('propiedades.index')->with('success', 'Propiedad eliminada correctamente');
    }
    
}
