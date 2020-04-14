<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

# Prefijos para nuestras rutas de admin
Route::prefix('/admin')->group( function(){

    Route::get('/', 'admin\DashboarController@getDashboar')->name('admin.index');

    Route::get('/usuarios', 'admin\DashboarController@getDashboar')->name('users.index');

    Route::get('/productos', 'admin\DashboarController@getDashboar')->name('users');

});
