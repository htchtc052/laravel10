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


//Auth::routes();
    
Route::get('/', ['middleware'=> 'guest', 'uses' => 'IndexController@showIndexPage'])->name('index_page');


// Activate
Route::get('activate', ['middleware'=> ['auth', 'isNotVerified'], 'uses' => 'ActivateController@showActivatePage'])->name('activate');
Route::get('activate/send', ['middleware'=> ['auth', 'isNotVerified'], 'uses' => 'ActivateController@sendActivate'])->name('activate_send');
Route::get('email-verification/error', 'Auth\VerificationConroller@getVerificationError')->name('email-verification.error');
Route::get('email-verification/check/{token}', 'Auth\VerificationConroller@getVerification')->name('email-verification.check');




// Authentication Routes...

Route::any('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('login', ['middleware'=> ['guest'], 'uses' => 'Auth\LoginController@showLoginForm'])->name('login');
Route::post('login', ['middleware'=> ['guest'], 'uses' => 'Auth\LoginController@login'])->name('login_post');

// Registration Routes...
Route::get('register', ['middleware' => ['guest'], 'uses' => 'Auth\RegisterController@showRegistrationForm'])->name('register');
Route::post('register', ['middleware' => ['guest'], 'uses' => 'Auth\RegisterController@register'])->name('register_post');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.set');


//home routes
Route::get('home', ['middleware' => ['auth', 'isVerified'], 'uses' => 'HomeController@showHomeIndex'])->name('home');
Route::get('home/settings', ['middleware' => ['auth', 'isVerified'], 'uses' => 'HomeController@showSettingsPage'])->name('home.settings');
Route::get('home/update', ['middleware' => ['auth', 'isVerified'], 'uses' => 'HomeController@showUpdateForm'])->name('home.update');
Route::post('home/update_save', ['middleware' => ['auth', 'isVerified'], 'uses' => 'HomeController@postUpdate'])->name('home.update_save');
Route::get('home/password/change', ['middleware' => ['auth', 'isVerified'], 'uses' => 'changePasswordController@showPasswordChangeForm'])->name('home.password.change');
Route::post('home/password/change_save', ['middleware' => ['auth', 'isVerified'], 'uses' =>'changePasswordController@writePasswordChange'])->name('home.password.change_save');


//infopages routes
Route::get('/plans', ['uses'=>'IndexController@plans']);
Route::get('/security', ['uses'=>'IndexController@security']);
Route::get('/about', ['uses'=>'IndexController@about']);
Route::get('/contact', ['uses'=>'IndexController@contact']);
Route::get('/help', ['uses'=>'IndexController@help']);
Route::get('/help/payments_and_billing/', ['uses'=>'IndexController@payments_and_billing']);
Route::get('/help/security_and_privacy/', ['uses'=>'IndexController@security_and_privacy']);
Route::get('/help/syncing_and_uploads/', ['uses'=>'IndexController@syncing_and_uploads']);
Route::get('/help/log_in_help/', ['uses'=>'IndexController@log_in_help']);
Route::get('/help/manage_account/', ['uses'=>'IndexController@manage_account']);
Route::get('/help/space_and_storage/', ['uses'=>'IndexController@space_and_storage']);
Route::get('/help/photos_and_videos/', ['uses'=>'IndexController@photos_and_videos']);
Route::get('/privacy', ['uses'=>'IndexController@privacy']);
Route::get('/principles', ['uses'=>'IndexController@principles']);