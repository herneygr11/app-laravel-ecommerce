<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct() {
        
    } # End method __construct
    public function index()
    {
        return view('admin.categories.index');
    }  # End method index

} // End class CategoryController
