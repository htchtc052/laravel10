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

Auth::routes();
    
Route::get('/home', ['middleware' => ['isVerified'], 'uses' => 'HomeController@index'])->name('home');

// Activate
Route::get('activate', ['middleware'=> ['auth'], 'uses' => 'ActivateController@showActivatePage'])->name('activate');
Route::get('activate/send', ['middleware'=> ['auth'], 'uses' => 'ActivateController@sendActivate'])->name('activate_send');


