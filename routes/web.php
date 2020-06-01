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
})->name('index');

// Router Auth
Route::get('/login', 'ConnectController@getLogin')
    ->name('login.index');

Route::post('/login', 'ConnectController@postLogin')
    ->name('login')->middleware(['isbanned']);

Route::get('/recover/password', 'ConnectController@recoverPassword')
    ->name('recover.index');

Route::post('/recover/password', 'ConnectController@emailRecoverPassword')
    ->name('recover.email');

Route::get('/recover/password/reset/{email}', 'ConnectController@RecoverPasswordReset')
    ->name('recover.reset');

Route::get('/logout', 'ConnectController@getLogout')
    ->name('logout');

// Router Registrer
Route::get('/register', 'ConnectController@getRegister')
    ->name('register');

Route::post('/register', 'ConnectController@postRegister')
    ->name('register');
