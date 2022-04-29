<?php

use App\Http\Controllers\Auth\LoginController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::prefix('users')->name('.users')->controller(UserAdminController::class)->group(function () {
        Route::get('/', 'index')->name('.index');
        Route::get('/{parameter}/filter', 'userFilter')->name('.filter');
        Route::post('/search', 'search')->name('.search');
        Route::get('/create', 'create')->name('.create');
        Route::post('/', 'store')->name('.store');
        Route::get('/{id}/edit', 'edit')->name('.edit');
        Route::put('/{id}/update', 'update')->name('.update');
        Route::delete('/{id}/remove', 'destroy')->name('.delete');
    });

    Route::prefix('profile')->name('.profile')->controller(ProfileController::class)->group(function () {
        Route::get('/', 'index')->name('.index');
        Route::get('/edit', 'edit')->name('.edit');
        Route::put('/{id}/update', 'update')->name('.update');
        Route::get('/password', 'password')->name('.password');
        Route::put('/password/change', 'changePassword')->name('.change.password');
    });

    Route::prefix('orders')->name('.orders')->controller(OrderController::class)->group(function () {
        Route::get('/', 'index')->name('.index');
        Route::post('/search', 'search')->name('.search');
        Route::get('/{parameter}/filter', 'orderFilter')->name('.filter');
        Route::get('/{id}/edit', 'edit')->name('.edit');
        Route::put('/{id}/update', 'update')->name('.update');
    });

    Route::prefix('categories')->name('.categories')->controller(CategoryController::class)->group(function () {
        Route::get('/', 'index')->name('.index');
        Route::post('/store', 'store')->name('.store');
        Route::get('/create', 'create')->name('.create');
        Route::post('/search', 'search')->name('.search');
        Route::get('/{parameter}/filter', 'categoryFilter')->name('.filter');
        Route::get('/{id}/edit', 'edit')->name('.edit');
        Route::put('/{id}/update', 'update')->name('.update');
        Route::delete('/{id}/remove', 'destroy')->name('.delete');
    });


    Route::prefix('products')->name('.products')->group(function () {
        Route::controller(ProductAdminController::class)->group(function () {
            Route::get('/', 'index')->name('.index');
            Route::post('/', 'store')->name('.store');
            Route::post('/search', 'search')->name('.search');
            Route::get('/{parameter}/filter', 'productFilter')->name('.filter');
            Route::get('/create', 'create')->name('.create');
            Route::get('/{id}/edit', 'edit')->name('.edit');
            Route::put('/{id}/update', 'update')->name('.update');
            Route::delete('/{id}/remove', 'destroy')->name('.delete');
        });

        Route::prefix('images')->name('.images')->controller(ImageController::class)->group(function () {
            Route::get('/{productId}', 'index')->name('.index');
            Route::post('/{productId}/add', 'store')->name('.store');
            Route::put('/{id}', 'update')->name('.update');
            Route::delete('/{id}/remove', 'destroy')->name('.delete');
            Route::delete('/{id}/removeAll', 'removeAll')->name('.removeall');
        });
    });

    Route::prefix('settings')->name('.settings')->group(function () {
        Route::controller(SystemController::class)->group(function () {
            Route::get('/{id}', 'edit')->name('.edit');
            Route::post('/{id}/update', 'update')->name('.update');
        });
        Route::prefix('slides')->name('.slides')->controller(SlideController::class)->group(function () {
            Route::get('/{systemId}', 'index')->name('.index');
            Route::post('/{systemId}/add', 'store')->name('.store');
            Route::delete('/{id}/remove', 'destroy')->name('.delete');
        }); 
    });

    Route::prefix('log')->name('.log')->controller(CustomLogController::class)->group(function () {
        Route::get('/', 'index')->name('.index');
        Route::post('/search', 'search')->name('.search');
        Route::get('/{parameter}/filter', 'logFilter')->name('.filter');
    });
});