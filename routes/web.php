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
    return view('auth/login');
});
Route::get('/register', function () {
    return view('auth/register');
});

Auth::routes();

Route::get('/home', 'toDoController@display');
Route::post('/insert', 'toDoController@insert')->middleware('auth');
Route::get('/todos', 'toDoController@display')->middleware('auth');
Route::get('/delete/{id}', 'toDoController@delete')->middleware('auth');
