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
Route::get('/aula12/rota_fixa/sejabemvindo', function() {
    return("Rota seja bem vindo");
});

//rota com parametro
Route::get('/aula12/ola/{nome}/{sobrenome}', function($nome,$sobrenome) {
    return("Olá $nome $sobrenome, seja Bem Vindo!");
});

// rota opcional
/** utilizamos rota opcional quando o usuario não é obrigado informar o parametro
 * na rota, assim podemos definir um valor padrão para o parametro em caso o usuário não informar
 * Caso nenhum valor informado, retornará "Carlos Eduardo dos Santos Roberto" */
Route::get('/aula13/{nome?}',function($nome="Carlos Eduardo dos Santos Roberto"){
    return $nome;
});

// rota com regra
Route::get('/aula14/rotacomregra/{qtd}/{nome}', function ($qtd,$nome) {
    for($i=1;$i<=$qtd;$i++) {
        echo "<p>$i - $nome</p>";
    };
})
->where('nome','[A-Za-z]+')
->where('qtd','[0-9]+');