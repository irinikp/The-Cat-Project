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

use App\Http\CatApiIntegrator;
use App\Http\Controllers\ImageController;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/random-image', 'ImageController@randomImagesView');
Route::get('/random-image', function (){
    return response()
        ->view('random-image',
            ['cat_collection' => (new ImageController(new CatApiIntegrator()))->index()], 200);
});
Route::get('/image/{id}', function($id){
    return response()->view('image', (new ImageController(new CatApiIntegrator()))->show($id), 200);
});
Route::fallback(function () {
    return response()->json(
        [
            'success' => false,
            'message' => 'Route not found'
        ], 404
    );
})->name('api.fallback.404');
