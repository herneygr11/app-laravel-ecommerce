<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function __construct() {
        //
    } # End method __construct

    public function index()
    {
        return view('admin.products.index');
    } # End method index

    public function createProduct()
    {
        return view('admin.products.create');
    } # End method createProduct

    public function saveProduct()
    {
        //
    } # End method saveProduct

} # End class ProductController
