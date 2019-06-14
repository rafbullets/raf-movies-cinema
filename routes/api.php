<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('movies', 'MovieController@index');
Route::get('movies/{movie}', 'MovieController@show');
Route::post('movies', 'MovieController@store');
Route::put('movies/{movie}', 'MovieController@update');
Route::delete('movies/{movie}', 'MovieController@delete');

Route::get('projections', 'ProjectionController@index');
Route::get('projections/{projection}', 'ProjectionController@show');
Route::post('projections', 'ProjectionController@store');
Route::put('projections/{projection}', 'ProjectionController@update');
Route::delete('projections/{projection}', 'ProjectionController@delete');

