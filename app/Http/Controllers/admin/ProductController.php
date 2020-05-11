<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use League\CommonMark\Util\ArrayCollection;

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
        // TODO: Identificar imagen y guar url en base de datos
        $request['image'] = 'image.png';
        
        if ( Product::create( $request->all() ) ) {
            return redirect()->route('products.index');
        }
    } # End method saveProduct

} # End class ProductController
