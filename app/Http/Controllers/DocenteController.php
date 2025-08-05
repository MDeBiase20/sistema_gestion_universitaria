<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\DocenteFormacion;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $docentes = Docente::all();
        return view('admin.docentes.index', compact('docentes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.docentes.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $datos = $request->all();
        // return response()->json($datos);

        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'dni' => 'required|unique:docentes',
            'fecha_nacimiento' => 'required',
            'telefono' => 'required',
            'email' => 'required|unique:users',
            'direccion' => 'required',
            'especialidad' => 'required',
            'rol' => 'required',
            'foto' => 'required |image',
        ]);

        $usuario = new User();
        $usuario->name = $request->nombre . ' ' . $request->apellidos;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->dni); // Asignar la contraseña como el DNI
        $usuario->save();

        $usuario->assignRole($request->rol);

        $docente = new Docente();
        $docente->usuario_id = $usuario->id;
        $docente->nombre = $request->nombre;
        $docente->apellidos = $request->apellidos;
        $docente->dni = $request->dni;
        $docente->fecha_nacimiento = $request->fecha_nacimiento;
        $docente->telefono = $request->telefono;
        $docente->direccion = $request->direccion;
        $docente->especialidad = $request->especialidad;


        $foto = $request->file('foto');
        $filename = time() . '_' . $foto->getClientOriginalName();
        $ruta_destino = public_path('uploads/fotos_docentes');
        $foto->move($ruta_destino, $filename);
        $fotoPath = 'uploads/fotos_docentes/' . $filename;
        
        $docente->foto = $fotoPath;

        $docente->save();

        return redirect()->route('admin.docentes.index')
                                        ->with('mensaje', 'Docente creado exitosamente.')
                                        ->with('icono', 'success');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $docente = Docente::findOrFail($id);
        $formaciones = DocenteFormacion::where('docente_id', $id)->get();
        return view('admin.docentes.show', compact('docente', 'formaciones'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $docente = Docente::findOrFail($id);
        $roles = Role::all();
        return view('admin.docentes.edit', compact('docente', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // $datos = $request->all();
        // return response()->json($datos);
        $docente = Docente::findOrFail($id);
        
        $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'dni' => 'required|unique:docentes,dni,' . $id,
            'fecha_nacimiento' => 'required',
            'telefono' => 'required',
            'email' => 'required|unique:users,email,' . $docente->usuario->id,
            'direccion' => 'required',
            'especialidad' => 'required',
            'foto' => 'image|nullable',
        ]);

        $usuario = User::findOrFail($docente->usuario_id);
        $usuario->name = $request->nombre . ' ' . $request->apellidos;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->dni); // Asignar la contraseña como el DNI
        $usuario->save();

        $usuario->syncRoles($request->rol);

        
        $docente->usuario_id = $usuario->id;
        $docente->nombre = $request->nombre;
        $docente->apellidos = $request->apellidos;
        $docente->dni = $request->dni;
        $docente->fecha_nacimiento = $request->fecha_nacimiento;
        $docente->telefono = $request->telefono;
        $docente->direccion = $request->direccion;
        $docente->especialidad = $request->especialidad;

        // Verificar si se ha subido una nueva foto
        if($request->hasFile('foto')) {

        // Eliminar el archivo del sistema de archivos
        if ($docente->foto && file_exists(public_path($docente->foto))) {
            unlink(public_path($docente->foto));
        }
            
            $foto = $request->file('foto');
            $filename = time() . '_' . $foto->getClientOriginalName();
            $ruta_destino = public_path('uploads/fotos_docentes');
            $foto->move($ruta_destino, $filename);
            $fotoPath = 'uploads/fotos_docentes/' . $filename;
            
            $docente->foto = $fotoPath;

        }

        $docente->save();

        return redirect()->route('admin.docentes.index')
                                        ->with('mensaje', 'Docente actualizado exitosamente.')
                                        ->with('icono', 'success');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $docente = Docente::findOrFail($id);
        $usuario = User::findOrFail($docente->usuario_id);

        // Eliminar el archivo del sistema de archivos
        if ($docente->foto && file_exists(public_path($docente->foto))) {
            unlink(public_path($docente->foto));
        }

        $docente->delete();

        $usuario->delete();

        return redirect()->route('admin.docentes.index')
                                        ->with('mensaje', 'Docente eliminado exitosamente.')
                                        ->with('icono', 'success');
    }
}
