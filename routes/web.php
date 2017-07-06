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

//Auth::routes();
    
Route::get('/home', ['middleware' => ['isVerified'], 'uses' => 'HomeController@index'])->name('home');

// Activate
Route::get('activate', ['middleware'=> ['auth'], 'uses' => 'ActivateController@showActivatePage'])->name('activate');
Route::get('activate/send', ['middleware'=> ['auth'], 'uses' => 'ActivateController@sendActivate'])->name('activate_send');
Route::get('email-verification/error', 'Auth\VerificationConroller@getVerificationError')->name('email-verification.error');
Route::get('email-verification/check/{token}', 'Auth\VerificationConroller@getVerification')->name('email-verification.check');




// Authentication Routes...

Route::any('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('login', ['middleware'=> ['guest'], 'uses' => 'Auth\LoginController@showLoginForm'])->name('login');
Route::post('login', ['middleware'=> ['guest'], 'uses' => 'Auth\LoginController@login'])->name('login_post');

// Registration Routes...
Route::get('register', ['middleware' => ['guest'], 'uses' => 'Auth\RegisterController@showRegistrationForm'])->name('register');
Route::post('register', ['middleware' => ['guest'], 'uses' => 'Auth\RegisterController@register']);

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.set');


