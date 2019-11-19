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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/pre', 'TopController@pre');
Route::post('/prestore', 'TopController@prestore');
Route::resource('/', 'TopController');

// Route::get('/pre', function () {
//     return view('pre');
// });
