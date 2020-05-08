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

    Route::get('/', 'admin\DashboarController@getDashboar')
        ->name('admin.index');

    # Start router usuario
    Route::get('/usuarios', 'admin\UserController@index')
    ->name('users.index');

    Route::get('/usuarios/{id}', 'admin\UserController@index')
    ->name('users.edit');

    Route::put('/usuarios/{id}', 'admin\UserController@index')
    ->name('users.edit');

    Route::delete('/usuarios/{id}', 'admin\UserController@index')
    ->name('users.delete');
    # End router usuario

    # Start router products
    Route::get('/productos', 'admin\ProductController@index')
        ->name('products.index');

    Route::get('/productos/crear', 'admin\ProductController@createProduct')
        ->name('products.create');

    Route::post('/productos', 'admin\ProductController@saveProduct')
        ->name('products.save');
    # End router products

    # Start router Categories
    Route::get('/categorias', 'admin\CategoryController@index')
        ->name('category.index');
    # End router Categories

});
