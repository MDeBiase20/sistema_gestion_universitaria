<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiantes = Estudiante::all();
        return view('admin.estudiantes.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.estudiantes.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $datos = $request->all();
        // return response()->json($datos);

        try {
            $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'dni' => 'required|unique:estudiantes',
            'fecha_nacimiento' => 'required',
            'telefono' => 'required',
            'ref_celular' => 'required',
            'parentesco' => 'required',
            'email' => 'required|unique:users',
            'direccion' => 'required',
            'profesion' => 'required',
            'rol' => 'required',
            'foto' => 'required |image',
        ]);

        $usuario = new User();
        $usuario->name = $request->nombre . ' ' . $request->apellido;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->dni); // Asignar la contraseña como el DNI
        $usuario->save();

        $usuario->assignRole($request->rol);

        $estudiante = new Estudiante();
        $estudiante->usuario_id = $usuario->id;
        $estudiante->nombre = $request->nombre;
        $estudiante->apellido = $request->apellido;
        $estudiante->dni = $request->dni;
        $estudiante->fecha_nacimiento = $request->fecha_nacimiento;
        $estudiante->telefono = $request->telefono;
        $estudiante->direccion = $request->direccion;
        $estudiante->profesion = $request->profesion;
        $estudiante->ref_celular = $request->ref_celular;
        $estudiante->parentesco = $request->parentesco;


        $foto = $request->file('foto');
        $filename = time() . '_' . $foto->getClientOriginalName();
        $ruta_destino = public_path('uploads/fotos_estudiantes');
        $foto->move($ruta_destino, $filename);
        $fotoPath = 'uploads/fotos_estudiantes/' . $filename;
        
        $estudiante->foto = $fotoPath;

        $estudiante->save();

        return redirect()->route('admin.estudiantes.index')
            ->with('mensaje', 'Estudiante creado con éxito')
            ->with('icono', 'success');

        } catch (\Exception $e) {
            Log::error('Error al guardar estudiante: ' . $e->getMessage());
        return back()->with('mensaje', 'Ocurrió un error al guardar el estudiante')
                    ->with('icono', 'error');
        }

        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $roles = Role::all();
        return view('admin.estudiantes.show', compact('estudiante', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $roles = Role::all();
        return view('admin.estudiantes.edit', compact('estudiante', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // $datos = $request->all();
        // return response()->json($datos);

        $estudiante = Estudiante::findOrFail($id);

        try {
            $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'dni' => 'required|unique:estudiantes,dni,' .$id,
            'fecha_nacimiento' => 'required',
            'telefono' => 'required',
            'ref_celular' => 'required',
            'parentesco' => 'required',
            'email' => 'required|unique:users,email,' .$estudiante->usuario->id,
            'direccion' => 'required',
            'profesion' => 'required',
            'rol' => 'required',
        ]);

        $usuario = User::findOrFail($estudiante->usuario->id);
        $usuario->name = $request->nombre . ' ' . $request->apellido;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->dni); // Asignar la contraseña como el DNI
        $usuario->save();

        $usuario->syncRoles($request->rol);

        $estudiante->usuario_id = $usuario->id;
        $estudiante->nombre = $request->nombre;
        $estudiante->apellido = $request->apellido;
        $estudiante->dni = $request->dni;
        $estudiante->fecha_nacimiento = $request->fecha_nacimiento;
        $estudiante->telefono = $request->telefono;
        $estudiante->direccion = $request->direccion;
        $estudiante->profesion = $request->profesion;
        $estudiante->ref_celular = $request->ref_celular;
        $estudiante->parentesco = $request->parentesco;

        // Verificar si se ha subido una nueva foto
        if($request->hasFile('foto')) {

        // Eliminar el archivo del sistema de archivos
        if ($estudiante->foto && file_exists(public_path($estudiante->foto))) {
            unlink(public_path($estudiante->foto));
        }
            
        $foto = $request->file('foto');
        $filename = time() . '_' . $foto->getClientOriginalName();
        $ruta_destino = public_path('uploads/fotos_estudiantes');
        $foto->move($ruta_destino, $filename);
        $fotoPath = 'uploads/fotos_estudiantes/' . $filename;
        
        $estudiante->foto = $fotoPath;

        }

        $estudiante->save();

        return redirect()->route('admin.estudiantes.index')
            ->with('mensaje', 'Estudiante actualizado con éxito')
            ->with('icono', 'success');

        } catch (\Exception $e) {
            Log::error('Error al actualizar estudiante: ' . $e->getMessage());
        return back()->with('mensaje', 'Ocurrió un error al actualizar el estudiante')
                    ->with('icono', 'error');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $usuario = User::findOrFail($estudiante->usuario->id);

        try {
            // Eliminar el archivo del sistema de archivos
            if ($estudiante->foto && file_exists(public_path($estudiante->foto))) {
                unlink(public_path($estudiante->foto));
            }

            $estudiante->delete();
            $usuario->delete();

            return redirect()->route('admin.estudiantes.index')
                ->with('mensaje', 'Estudiante eliminado con éxito')
                ->with('icono', 'success');

        } catch (Exception $e) {
            Log::error('Error al eliminar estudiante: ' . $e->getMessage());
            return back()->with('mensaje', 'Ocurrió un error al eliminar el estudiante')
                        ->with('icono', 'error');
        }
    }
}
