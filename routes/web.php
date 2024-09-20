<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CategoriasController;

Route::get('/', function () {
    //return view('');
});



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/
Route::get('/', [UsuarioController::class, 'index'])->name('user.index');
Route::get('/crear', [UsuarioController::class, 'show'])->name('user.form');
Route::post('/crear', [UsuarioController::class, 'create'])->name('user.crear');
Route::get('/{id}/editar', [UsuarioController::class, 'edit'])->name('user.editar');
Route::put('/{id}/update', [UsuarioController::class, 'update'])->name('user.update');
Route::delete('/{id}/delete', [UsuarioController::class, 'destroy'])->name('user.delete');
Route::resources(

    [
        'post' => PostController::class
    ]
   

    );

Route::get('/categoria', [CategoriasController::class, 'index'])->name('categoria.index');
Route::get('/categoria/crear', [CategoriasController::class, 'show'])->name('categoria.form');
Route::post('/categoria/crear', [CategoriasController::class, 'create'])->name('categoria.crear');
Route::get('/categoria/{id}/editar', [CategoriasController::class, 'edit'])->name('categoria.editar');
Route::put('/categoria/{id}/update', [CategoriasController::class, 'update'])->name('categoria.update');
Route::delete('/categoria/{id}/delete', [CategoriasController::class, 'destroy'])->name('categoria.delete');