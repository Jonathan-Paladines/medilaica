<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        //Role::create($request->all());

        Role::create([
            'name' => $request->input('name'),
            'guard_name' => 'web', // Agrega el valor predeterminado para guard_name
        ]);

        return redirect()->route('roles.index')->with('success', 'Rol creado exitosamente.');
    }

    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $role->update($request->all());
        return redirect()->route('roles.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index');
    }

        public function show(Role $role)
    {
        return view('roles.show', compact('role'));
    }

    // Método para mostrar el formulario de asignación de roles
    public function assign()
{
    // Obtener todos los usuarios y roles
    $users = User::all();
    $roles = Role::all();
    
    // Retornar la vista con los usuarios y roles
    return view('roles.assign', compact('users', 'roles'));
}

public function storeAssign(Request $request, $userId)
{
    // Validar la solicitud
    $request->validate([
        'roles' => 'required|array',
        'roles.*' => 'exists:roles,id',
    ]);

    // Encuentra al usuario por su ID
    //$user = User::findOrFail($userId);
    $user = User::findOrFail($request->input('user_id'));

    // Asigna los roles al usuario
    $user->syncRoles($request->input('roles'));

    // Redirige a una vista con éxito
    return redirect()->route('roles.assign')->with('success', 'Rol(s) asignado(s) exitosamente.');
}
}
