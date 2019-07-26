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

Route::resource('users', 'UserController');

Route::get('movimentations/{id}', 'MovimentationController@list');
Route::resource('movimentations', 'MovimentationController');

Route::post('login', 'UserController@login');
Route::get('summary/{id}', 'MovimentationController@summary');


Route::get('/', function () {
	return response()->json(['message' => 'Jobs API', 'status' => 'Connected']);;
});