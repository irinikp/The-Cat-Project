<?php

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

Route::get('/random-image', 'ImageController@index');
Route::get('/image/{id}', 'ImageController@show');
Route::fallback(function () {
    return response()->json(
        [
            'success' => false,
            'message' => 'Route not found'
        ], 404
    );
})->name('api.fallback.404');
