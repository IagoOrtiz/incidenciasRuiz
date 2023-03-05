<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncidenciaController;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('dashboard/{filtro?}',[IncidenciaController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('users',[UserController::class,'index'])->middleware(['auth', 'verified'])->name('users');

Route::get('incidencias/create',[IncidenciaController::class,'create'])->middleware(['auth', 'verified'])->name('incidencias.create');
Route::get('incidencias/{incidencia}',[IncidenciaController::class,'show'])->middleware(['auth', 'verified'])->name('incidencias.show'); 
Route::post('incidencias/store',[IncidenciaController::class,'store'])->middleware(['auth', 'verified'])->name('incidencias.store');

Route::get('incidencias/{incidencia}/edit',[IncidenciaController::class,'edit'])->middleware(['auth', 'verified'])->name('incidencias.edit');
Route::get('incidencias/{incidencia}/admin',[IncidenciaController::class,'admin'])->middleware(['auth', 'verified'])->name('incidencias.admin');
Route::put('incidencias/{incidencia}',[IncidenciaController::class,'update'])->middleware(['auth', 'verified'])->name('incidencias.update');
Route::put('users/{usuario}',[UserController::class,'update'])->middleware(['auth', 'verified'])->name('user.admin');

Route::delete('incidencias/{incidencia}',[IncidenciaController::class,'destroy'])->middleware(['auth', 'verified'])->name('incidencias.destroy');
Route::delete('users/{usuario}',[UserController::class,'destroy'])->middleware(['auth', 'verified'])->name('user.destroy');

require __DIR__.'/auth.php';
