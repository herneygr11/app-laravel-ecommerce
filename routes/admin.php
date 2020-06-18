<?php

# Prefijos para nuestras rutas de admin
Route::prefix('/admin')->group(function () {

    Route::get('/', 'admin\DashboarController@getDashboar')
        ->name('admin.index');

    # Start router usuario
    Route::get('/usuarios/{status?}', 'admin\UserController@index')
        ->name('users.index');

    Route::get('/usuarios/{user:slug}/edit', 'admin\UserController@editUser')
        ->name('users.edit');

    Route::get('/usuarios/{user:slug}/permissions', 'admin\UserController@permissionsUser')
        ->name('users.permissions');

    Route::post('/usuarios/{user:id}/permissions', 'admin\UserController@setPermissionsUser')
        ->name('users.permissions');

    Route::put('/usuarios/{id}', 'admin\UserController@index')
        ->name('users.update');

    Route::put('/usuarios/{id}', 'admin\UserController@bannedUser')
        ->name('users.banned');

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
    # TODO: cambiar el estilo de la ruta para mayor compresion para todas las rutas con slug
    Route::get('/productos/{Product:slug}/edit', 'admin\ProductController@editProduct')
        ->name('products.edit');

    Route::put('/productos/{id}', 'admin\ProductController@updateProduct')
        ->name('products.update');

    Route::post('/productos/{id}', 'admin\ProductController@delete')
        ->name('products.delete');

    Route::post('/productos/galeria/{id}/add', 'admin\ProductController@addImageGallery')
        ->name('products.gallery');

    Route::delete('/productos/galeria/{idImage}/{idProduct}', 'admin\ProductController@deleteImageGallery')
        ->name('products.gallery.delete');
    # End router products

    # Start router Categories
    Route::get('/categorias', 'admin\CategoryController@index')
        ->name('categories.index');

    Route::get('/categorias/{category:slug}/edit', 'admin\CategoryController@editCategory')
        ->name('categories.edit');

    Route::post('/categorias', 'admin\CategoryController@saveCategory')
        ->name('categories.save');

    Route::put('/categorias/{id}', 'admin\CategoryController@updateCategory')
        ->name('categories.update');

    Route::delete('/categorias/{id}', 'admin\CategoryController@deleteCategory')
        ->name('categories.delete');
    # End router Categories

});
