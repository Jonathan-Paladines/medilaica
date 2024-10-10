<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    // Muestra los usuarios y sus roles
    public function index()
    {
        $users = User::with('roles')->get();
        return view('user_roles.index', compact('users'));
    }

    // Muestra el formulario para asignar roles a un usuario
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all(); // Obtiene todos los roles disponibles
        return view('user_roles.edit', compact('user', 'roles'));
    }

    // Actualiza los roles de un usuario
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->syncRoles($request->roles); // Sincroniza los roles seleccionados
        return redirect()->route('user_roles.index')->with('success', 'Roles actualizados correctamente');
    }
}

