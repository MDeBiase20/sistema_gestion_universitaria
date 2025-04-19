<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $niveles = Nivel::all();
        return view('admin.niveles.index', compact('niveles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.niveles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $nivel = new Nivel();
        Nivel::create([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('admin.niveles.index')
            ->with('mensaje', 'Nivel creado exitosamente.')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Nivel $nivel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $nivel = Nivel::findOrFail($id);
        return view('admin.niveles.edit', compact('nivel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $nivel = Nivel::findOrFail($id);
        $nivel->update([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('admin.niveles.index')
            ->with('mensaje', 'Nivel actualizado exitosamente.')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $nivel = Nivel::findOrFail($id);
        $nivel->delete();

        return redirect()->route('admin.niveles.index')
            ->with('mensaje', 'Nivel eliminado exitosamente.')
            ->with('icono', 'success');
    }
}
