<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmprestimoController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\PrateleiraController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Scriptotek\GoogleBooks\GoogleBooks;

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

Route::get('/livro/cadastro', function () {
    return view('livros.cadastro');
});

Route::get('/alunos/cadastro', function () {
    return view('alunos.cadastro');
});

Route::get('/emprestimos/cadastro', function () {
    return view('emprestimos.cadastro');
});



Route::get('/listagem-usuario', [UserController::class,'listUser'])->name('teste.controller');

Auth::routes();


Route::middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::prefix('users')->name('users')->controller(UserController::class)->group(function () {
        Route::get('/', 'index')->name('.index');
        Route::get('/{parameter}/filter', 'userFilter')->name('.filter');
        Route::post('/search', 'search')->name('.search');
        Route::get('/create', 'create')->name('.create');
        Route::post('/', 'store')->name('.store');
        Route::get('/{id}/edit', 'edit')->name('.edit');
        Route::put('/{id}/update', 'update')->name('.update');
        Route::delete('/{id}/remove', 'destroy')->name('.delete');
    });
    
    Route::prefix('livros')->name('livros')->controller(LivroController::class)->group(function () {
        Route::get('/', 'index')->name('.index');
        Route::get('/busca', 'busca')->name('.busca');
        Route::get('/{parameter}/filter', 'livroFilter')->name('.filter');
        Route::post('/search', 'search')->name('.search');
        Route::get('/create', 'create')->name('.create');
        Route::post('/', 'store')->name('.store');
        Route::get('/{id}/edit', 'edit')->name('.edit');
        Route::put('/{id}/update', 'update')->name('.update');
        Route::delete('/{id}/remove', 'destroy')->name('.delete');
    });
    Route::prefix('generos')->name('generos')->controller(GeneroController::class)->group(function () {
        Route::get('/', 'index')->name('.index');
        Route::get('/{parameter}/filter', 'generoFilter')->name('.filter');
        Route::post('/search', 'search')->name('.search');
        Route::get('/create', 'create')->name('.create');
        Route::post('/', 'store')->name('.store');
        Route::get('/{id}/edit', 'edit')->name('.edit');
        Route::put('/{id}/update', 'update')->name('.update');
        Route::delete('/{id}/remove', 'destroy')->name('.delete');
    });
    Route::prefix('prateleiras')->name('prateleiras')->controller(PrateleiraController::class)->group(function () {
        Route::get('/', 'index')->name('.index');
        Route::get('/{parameter}/filter', 'prateleiraFilter')->name('.filter');
        Route::post('/search', 'search')->name('.search');
        Route::get('/create', 'create')->name('.create');
        Route::post('/', 'store')->name('.store');
        Route::get('/{id}/edit', 'edit')->name('.edit');
        Route::put('/{id}/update', 'update')->name('.update');
        Route::delete('/{id}/remove', 'destroy')->name('.delete');
    });

    Route::prefix('emprestimos')->name('emprestimos')->controller(EmprestimoController::class)->group(function () {
        Route::get('/', 'index')->name('.index');
        Route::get('/{parameter}/filter', 'prateleiraFilter')->name('.filter');
        Route::post('/search', 'search')->name('.search');
        Route::get('/create', 'create')->name('.create');
        Route::post('/', 'store')->name('.store');
        Route::get('/autocomplete', 'autocomplete')->name('.autocomplete');
        Route::get('/autocompletelivros', 'autocompletelivros')->name('.autocompletelivros');
        Route::get('/{id}/update', 'update')->name('.update');
    });

    Route::prefix('videos')->name('videos')->controller(VideoController::class)->group(function () {
        Route::get('/', 'index')->name('.index');
    });

});