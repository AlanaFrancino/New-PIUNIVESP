<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return view('home');
});

Route::get('/livro/cadastro', function () {
    return view('livros.cadastro');
});

Route::get('/alunos/cadastro', function () {
    return view('alunos.cadastro');
});

Route::get('/emprestimos/cadastro', function () {
    return view('emprestimos.cadastro');
});

Route::get('/usuarios/cadastro', function () {
    return view('usuarios.cadastro');
});


Route::get('/listagem-usuario', [UserController::class,'listUser'])->name('teste.controller');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

