<?php

use App\Http\Controllers\Api\EspApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::post('/search', 'EspApiController@search');
Route::controller(EspApiController::class)->group(function(){

    Route::post('/search', 'search')->name('search'); //função de insert no banco

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
