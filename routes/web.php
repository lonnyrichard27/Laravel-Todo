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

use App\Http\Controllers\TodosController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('todos', 'TodosController@index');
Route::get('todos/{todo}', 'TodosController@show');
// create new todo
Route::get('new-todos', 'TodosController@create');
// save todo to the database
Route::post('store-todos', 'TodosController@store');

Route::get('todos/{todo}/edit', 'TodosController@edit');
Route::post('todos/{todo}/update-todos', 'TodosController@update');
Route::get('todos/{todo}/delete', 'TodosController@destroy');