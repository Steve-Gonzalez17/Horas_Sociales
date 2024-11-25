<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ValesController;
use App\Http\Controllers\EntregaValesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// Rutas que no requieren autenticación
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



Route::get('/sistema-administracion', function () {
    $users = User::all();
    return view('admin/AdminPanel', ['users' => $users, 'currentUser' => Session::get('user')]);
});


// Rutas que requieren autenticación
Route::middleware(['checksession'])->group(function () {
    Route::get('/', function () {
        return view('index');
    });
    
    // Ruta de los vales
    Route::get('/', [ValesController::class, 'index'])->name('vales.index');
    Route::post('/vales/store', [ValesController::class, 'store'])->name('vales.store');

    // Ruta de los entregavales
    Route::get('/entregavales/list', [EntregaValesController::class, 'entregavalesList']);  // Para obtener los entregavales
    Route::post('/entregavales', [EntregaValesController::class, 'store'])->name('entregavales.store');

    // Rutas para el admin
    Route::post('/user/store', [UserController::class, 'store'])->name('store.user');
    Route::put('/user/update', [UserController::class, 'update'])->name('update.user');
    Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('delete.user');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});