<?php

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::get('api/todo', function () {
//     return response()->json([ 'status' => 'OK']);
// });

// Route::get('v1/todo', [App\Http\Controllers\API\TodoController::class, 'index'])->name('todo');
// Route::post('v1/todo', [App\Http\Controllers\API\TodoController::class, 'store'])->name('create');

Route::get('v1/todo/', 'App\Http\Controllers\API\TodoController@index');
Route::post('v1/todo/create', 'App\Http\Controllers\API\TodoController@store');
Route::get('v1/todo/edit/{id}', 'App\Http\Controllers\API\TodoController@show');
Route::post('v1/todo/update/{id}', 'App\Http\Controllers\API\TodoController@update');
Route::get('v1/todo/delete/{id}', 'App\Http\Controllers\API\TodoController@destroy');

// Route::get('v1/todo', function() {
//     return response()->json([ 'status' => 'OK' , 'data' => [] ]);
// });


// Route::post('v1/todo', function(Request $request) {
//     return response()->json([ 'status' => '200' , 'data' => $request->all() ]);
// });