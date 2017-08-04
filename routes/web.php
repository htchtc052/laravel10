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

Route::get('/', ['middleware' => 'guest', 'uses' => 'IndexController@showIndexPage'])->name('index_page');

// Authentication Routes...

Route::any('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('login', ['middleware' => ['guest'], 'uses' => 'Auth\LoginController@showForm'])->name('login');
Route::post('login', ['middleware' => ['guest'], 'uses' => 'Auth\LoginController@saveForm'])->name('login_save');

// Registration Routes...
Route::get('register', ['middleware' => ['guest'], 'uses' => 'Auth\RegisterController@showForm'])->name('register');
Route::post('register', ['middleware' => ['guest'], 'uses' => 'Auth\RegisterController@saveForm'])->name('register_save');

// Activate
Route::get('activate', ['middleware' => ['auth', 'isNotVerified'], 'uses' => 'Auth\ActivateController@showPage'])->name('activate');
Route::get('activate/send', ['middleware' => ['auth', 'isNotVerified'], 'uses' => 'Auth\ActivateController@sendActivate'])->name('activate_send');
Route::get('activate/check/{token}', 'Auth\ActivateController@activateUser')->name('activate_check');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@saveForm')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@saveForm')->name('password.set');

//home routes
Route::get('home', ['middleware' => ['auth', 'isVerified'], 'uses' => 'Home\IndexController@showIndex'])->name('home');
Route::get('home/account', ['middleware' => ['auth', 'isVerified'], 'uses' => 'Home\Account\IndexController@showIndex'])->name('home.account');

Route::get('home/account/update', ['middleware' => ['auth', 'isVerified'], 'uses' => 'Home\Account\UpdateController@showForm'])->name('home.account.update');
Route::post('home/account/update_save', ['middleware' => ['auth', 'isVerified'], 'uses' => 'Home\Account\UpdateController@saveForm'])->name('home.account.update_save');

Route::get('home/account/avatar', ['middleware' => ['auth', 'isVerified'], 'uses' => 'Home\Account\AvatarController@showForm'])->name('home.account.avatar');
Route::post('home/account/avatar_save', ['middleware' => ['auth', 'isVerified'], 'uses' => 'Home\Account\AvatarController@save'])->name('home.account.avatar_save');
Route::post('home/account/avatar_delete', ['middleware' => ['auth', 'isVerified'], 'uses' => 'Home\Account\AvatarController@delete'])->name('home.account.avatar_delete');

Route::get('home/account/password', ['middleware' => ['auth', 'isVerified'], 'uses' => 'Auth\PasswordChangeController@showForm'])->name('home.account.password');
Route::post('home/account/password_save', ['middleware' => ['auth', 'isVerified'], 'uses' => 'Auth\PasswordChangeController@saveForm'])->name('home.account.password_save');

Route::get('home/account/email', ['middleware' => ['auth', 'isVerified'], 'uses' => 'Auth\ChangeEmailController@showForm'])->name('home.account.email');
Route::post('home/account/email_save', ['middleware' => ['auth', 'isVerified'], 'uses' => 'Auth\ChangeEmailController@saveForm'])->name('home.account.email_save');
Route::get('home/account/email_set/{token}', ['middleware' => ['auth', 'isVerified'], 'uses' => 'Auth\ChangeEmailController@emailSet'])->name('home.account.email_set');

//infopages routes
Route::get('plans', ['uses' => 'IndexController@plans']);
Route::get('security', ['uses' => 'IndexController@security']);
Route::get('about', ['uses' => 'IndexController@about']);
Route::get('contact', ['uses' => 'IndexController@contact']);
Route::get('help', ['uses' => 'IndexController@help']);
Route::get('help/payments_and_billing', ['uses' => 'IndexController@payments_and_billing']);
Route::get('help/security_and_privacy', ['uses' => 'IndexController@security_and_privacy']);
Route::get('help/syncing_and_uploads', ['uses' => 'IndexController@syncing_and_uploads']);
Route::get('help/log_in_help', ['uses' => 'IndexController@log_in_help']);
Route::get('help/manage_account', ['uses' => 'IndexController@manage_account']);
Route::get('help/space_and_storage', ['uses' => 'IndexController@space_and_storage']);
Route::get('help/photos_and_videos', ['uses' => 'IndexController@photos_and_videos']);
Route::get('privacy', ['uses' => 'IndexController@privacy']);
Route::get('principles', ['uses' => 'IndexController@principles']);
