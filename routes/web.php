<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

//rota fixa
Route::get('/rota_fixa/sejabemvindo', function() {
    return("Rota seja bem vindo");
});

//rota com parametro
Route::get('/ola/{nome}/{sobrenome}', function($nome,$sobrenome) {
    return("Olá $nome $sobrenome, seja Bem Vindo!");
});
