<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // Método para mostrar el panel de administración
    public function index()
    {
        // Obtener todos los usuarios
        $users = User::all();
        return view('admin.AdminPanel', compact('users'));
    }

    // Método para registrar un nuevo usuario
    public function store(Request $request)
    {
        // Validación de los datos
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'username.unique' => 'El nombre de usuario ya ha sido utilizado.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Crear el usuario
        User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'password' => bcrypt($request->password), // Encriptar la contraseña
        ]);

        return redirect('/admin')->with('success', 'Usuario creado correctamente');
    }

    // Método para actualizar un usuario existente
    public function update(Request $request)
    {
        // Validación de los datos
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Encontrar el usuario y actualizar
        $user = User::find($request->id);
        if ($user) {
            $user->name = $request->name;
            $user->lastname = $request->lastname;
            $user->username = $request->username;
            $user->save();
            return redirect('/admin')->with('success', 'Usuario actualizado correctamente');
        }

        return redirect('/admin')->with('error', 'Usuario no encontrado');
    }

    // Método para eliminar un usuario
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect('/admin')->with('success', 'Usuario eliminado correctamente');
        }

        return redirect('/admin')->with('error', 'Usuario no encontrado');
    }


}