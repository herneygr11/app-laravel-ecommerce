<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Str, Image;

class ProductController extends Controller
{
    /**
     * Llamamos librerias necesarias y middleware
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin');
    } # End method __construct

    public function index()
    {
        if ( view()->exists('admin.products.index') ){
            return view('admin.products.index');
        }
    } # End method index

    public function createProduct()
    {
        $categories = Category::all()->pluck('name', 'id');

        if ( view()->exists('admin.products.create') ){
            return view('admin.products.create', compact( 'categories' ) );
        }
    } # End method createProduct

    public function saveProduct( ProductRequest $request )
    {
        $request['status'] = 1;
        
        // preparamos para subir la imagen al servidor
        $path = 'images/products/' . date('Y-m-d');
        $fileExt = trim( $request->file('file_image')->getClientOriginalExtension());
        $fileName = rand(1, 999) . '-' . Str::slug($request->name) . '.' . $fileExt;

        $request->file('file_image')->move( $path, $fileName );

        $imageMiniature = Image::make($path . '/' .$fileName);
        $imageMiniature->fit( 256, 256, function( $constraint ){
            $constraint->upsize();
        });
        $imageMiniature->save( $path . '/' . 'm_' . $fileName );

        $request['image'] = $fileName;
        
        if ( Product::create( $request->all() ) ) {
            return redirect()->route('products.index');
        }
    } # End method saveProduct

} # End class ProductController
