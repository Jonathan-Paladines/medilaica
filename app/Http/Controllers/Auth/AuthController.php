<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{


    public function registerForm(): View
    {
        return view('auth.register');
    }

    public function registerVerify(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:12',
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8'],
        ], [
            'name.required' => 'El nombre es requerido',
            'name.min' => 'El nombre debe tener al menos 4 caracteres',
            'email.required' => 'El email es requerido',
            'email.email' => 'El email debe ser válido',
            'email.unique' => 'El email ya está registrado',
            'password.required' => 'La contraseña es requerida',
            'password.min' => 'La contraseña debe tener al menos 4 caracteres',
        ]);

        // Guarda el usuario en la base de datos
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),  // Encripta la contraseña
        ]);

        return redirect()->route('login')->with('success', 'Registro exitoso. Por favor, inicia sesión.');
    }


    public function loginForm(): View
    {
        return view('auth.login');
    }

    public function loginVerify(Request $request)
{
    $request->validate([
        'email' => ['required', 'email'],  // Cambié la regla de validación a 'email'
        'password' => ['required', 'min:8'],
    ], [
        'email.required' => 'El email es requerido',
        'email.email' => 'El email debe ser válido',
        'password.required' => 'La contraseña es requerida',
        'password.min' => 'La contraseña debe tener al menos 4 caracteres',
    ]);

    // Intenta autenticación con las credenciales proporcionadas
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        return redirect()->route('dashboard');
    }

    return back()->withErrors(['invalid_credentials' => 'Los datos de inicio de sesión no son correctos'])->withInput();
}

    public function signOut(){
        Auth::logout();
        return redirect()->route('login')->with('success', 'Sesión cerrada correctamente.');
    }

}
