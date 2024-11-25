<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Muestra el formulario de inicio de sesión.
     */
    public function showLoginForm()
    {
        return view('login.login'); // Asegúrate de crear esta vista
    }

    /**
     * Maneja el inicio de sesión del usuario.
     */

    public function login(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Busca el usuario en la base de datos
        $user = DB::table('users')->where('username', $request->username)->first();

        
        // Verifica si el usuario existe y la contraseña es correcta
        if ($user && password_verify($request->password, $user->password)) {
            if ($user->username == 'admin') { // o $user->role == 'admin' si tienes roles en tu modelo
                Session::put('user', $user);
                return redirect('/sistema-administracion'); // Redirecciona al panel de admin
            } else {
                Session::put('user', $user);
                return redirect('/'); // Redirecciona al usuario regular
            }
        } else {
            // Maneja el error de autenticación (por ejemplo, redireccionar con un mensaje de error)
            return redirect()->back()->withInput()->withErrors(['login' => 'Usuario o contraseña incorrectos']);
        }
    }

    /**
     * Maneja el cierre de sesión del usuario.
     */
    public function logout(Request $request)
    {
        Session::forget('user');
        return redirect('/login'); // Cambia esto según tus necesidades
    }
}