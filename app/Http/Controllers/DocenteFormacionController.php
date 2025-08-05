<?php

namespace App\Http\Controllers;

use App\Models\DocenteFormacion;
use Illuminate\Http\Request;

class DocenteFormacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        // $datos = $request->all();
        // return response()->json($datos);

        $request->validate([
            'titulo' => 'required',
            'institucion' => 'required',
            'nivel' => 'required',
            'fecha_graduacion' => 'required',
            'archivo' => 'required',
        ]);

        $formacion = new DocenteFormacion();
        $formacion->docente_id = $id;
        $formacion->titulo = $request->titulo;
        $formacion->institucion = $request->institucion;
        $formacion->nivel = $request->nivel;
        $formacion->fecha_graduacion = $request->fecha_graduacion;

        $archivo = $request->file('archivo');
        $filename = time() . '_' . $archivo->getClientOriginalName();
        $ruta_destino = public_path('uploads/archivos_formacion_docentes');
        $archivo->move($ruta_destino, $filename);
        $archivoPath = 'uploads/archivos_formacion_docentes/' . $filename;

        $formacion->archivo = $archivoPath;

        $formacion->save();

        return redirect()->back()
                        ->with('mensaje', 'Formación del docente registrada correctamente')
                        ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(DocenteFormacion $docenteFormacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DocenteFormacion $docenteFormacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DocenteFormacion $docenteFormacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $formacion = DocenteFormacion::findOrFail($id);

        // Eliminar el archivo del sistema de archivos
        if (file_exists(public_path($formacion->archivo))) {
            unlink(public_path($formacion->archivo));
        }

        $formacion->delete();

        return redirect()->back()
                        ->with('mensaje', 'Formación del docente eliminada correctamente')
                        ->with('icono', 'success');
    }
}
