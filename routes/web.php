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


Route::get('/', 'ProjectController@index');
Route::get('/create', 'ProjectController@create');
Route::get('/show-{id}', 'ProjectController@show');
Route::post('/store', 'ProjectController@store');
Route::get('/edit-{id}', 'ProjectController@edit');
Route::post('/update-{id}', 'ProjectController@update');
Route::get('/delete-{id}', 'ProjectController@delete');
