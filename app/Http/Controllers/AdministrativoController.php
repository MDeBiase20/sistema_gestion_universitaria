<?php

namespace App\Http\Controllers;

use App\Models\Administrativo;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdministrativoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $administrativos = Administrativo::lazy();
        return view('admin.administrativos.index', compact('administrativos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.administrativos.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'dni' => 'required|string|unique:administrativos',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'profesion' => 'required|string|max:255',
            'rol' => 'required',
            'email' => 'required|string|unique:users',
        ]);

        $usuario = new User();
        $usuario->name = $request->nombre." ".$request->apellidos;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->dni);
        $usuario->save();

        $usuario->assignRole($request->rol);

        $administrativo = new Administrativo();
        $administrativo->usuario_id = $usuario->id;
        $administrativo->nombre = $request->nombre;
        $administrativo->apellidos = $request->apellido;
        $administrativo->dni = $request->dni;
        $administrativo->fecha_nacimiento = $request->fecha_nacimiento;
        $administrativo->telefono = $request->telefono;
        $administrativo->direccion = $request->direccion;
        $administrativo->profesion = $request->profesion;

        $administrativo->save();

        return redirect()->route('admin.administrativos.index')
        ->with('mensaje', 'Personal administrativo creado con éxito')
        ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $roles = Role::all();
        $administrativo = Administrativo::findOrFail($id);
        return view('admin.administrativos.show', compact('administrativo', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $roles = Role::all();
        $administrativo = Administrativo::findOrFail($id);
        return view('admin.administrativos.edit', compact('administrativo', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $administrativo = Administrativo::findOrFail($id);
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'dni' => 'required|string|unique:administrativos,dni,'.$id,
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'profesion' => 'required|string|max:255',
            'rol' => 'required',
            'email' => 'required|string|unique:users,email,'.$administrativo->usuario->id,
        ]);

        $administrativo->nombre = $request->nombre;
        $administrativo->apellidos = $request->apellido;
        $administrativo->dni = $request->dni;
        $administrativo->fecha_nacimiento = $request->fecha_nacimiento;
        $administrativo->telefono = $request->telefono;
        $administrativo->direccion = $request->direccion;
        $administrativo->profesion = $request->profesion;

        if ($request->email != null) {
            $usuario = User::findOrFail($administrativo->usuario_id);
            $usuario->email = $request->email;
            if ($request->password != null) {
                $usuario->password = Hash::make($request->password);
            }
            $usuario->save();
        }

        if ($request->rol != null) {
            $usuario = User::findOrFail($administrativo->usuario_id);
            $usuario->syncRoles($request->rol); //Va a reemplazar en el modelo y al rol que tiene actualmente al registro que queremos actualizar
        }

        $administrativo->save();

        return redirect()->route('admin.administrativos.index')
        ->with('mensaje', 'Personal administrativo actualizado con éxito')
        ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $administrativo = Administrativo::findOrFail($id);
        $usuario = User::findOrFail($administrativo->usuario_id);
        $usuario->delete();
        $administrativo->delete();

        return redirect()->route('admin.administrativos.index')
        ->with('mensaje', 'Personal administrativo eliminado con éxito')
        ->with('icono', 'success');
    }
}
