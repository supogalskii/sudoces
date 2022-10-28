<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatosController;
use App\Http\Controllers\ReceitasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/');
});

Route::get('contatos/buscar',[ContatosController::class,'buscar']);

Route::resource('contatos',ContatosController::class);

Route::get('receitas/buscar',[ReceitasController::class,'buscar']);
Route::resource('receitas',ReceitasController::class);;

