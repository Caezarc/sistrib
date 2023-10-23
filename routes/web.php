<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\CompraController;
use App\Http\controllers\ClienteController;
use App\Http\controllers\ventaController;
use App\Http\controllers\codigoController;
use App\Http\Controllers\IvaventasController;
use App\Http\Controllers\RetventasController;
use App\Http\Controllers\IvacomprasController;
use App\Http\Controllers\RetcomprasController;

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

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/inicio', function () {
    return view('inicio');
})->middleware(['auth', 'verified'])->name('inicio');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/inicio', [AdminController::class, 'index'])->name('layouts.admin');
    Route::resource('compras', CompraController::class,);
    Route::resource('ventas', ventaController::class);
    Route::resource('clientes', ClienteController::class);
    Route::resource('codigos', CodigoController::class);
    Route::resource('ivaventas', IvaventasController::class);
    Route::resource('retventas', RetventasController::class);
    Route::resource('ivacompras', IvacomprasController::class);
    Route::resource('retcompras', RetcomprasController::class);
});

require __DIR__.'/auth.php';
