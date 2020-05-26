<?php

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
    return view('welcome');
})->name('welcome');
// Tạo 1 nhóm route với tiền tố customer
Route::prefix('customer')->group(function () {
    Route::get('index', 'CustomerController@index');

    Route::get('create', 'CustomerController@create');

    Route::post('store', 'CustomerController@store');

    Route::get('{id}/show', 'CustomerController@show');

    Route::get('{id}/edit', 'CustomerController@edit');

    Route::patch('{id}/update', 'CustomerController@update');

    Route::delete('{id}', 'CustomerController@destroy');
});
Route::resource('customers', 'CustomerController');



Route::prefix('tasks')->group(function () {
    Route::get('/', 'TaskController@index');
    Route::post('/', 'TaskController@index');

    Route::get('/create', 'TaskController@create');

    Route::post('/store', 'TaskController@store');

    Route::get('/{taskId}', 'TaskController@show');

    Route::get('/{taskId}/edit', 'TaskController@edit');

    Route::patch('/{taskId}', 'TaskController@update');

    Route::delete('/{photo}', 'TaskController@destroy');
});
Route::get('/tasks', 'TaskController@index')->name('tasks.index');
Route::get('/tasks/create', 'TaskController@create')->name('tasks.create');
Route::post('/tasks', 'TaskController@store')->name('tasks.store');
