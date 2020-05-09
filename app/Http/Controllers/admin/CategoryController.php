<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Llamamos librerias necesarias y middleware
     */
    public function __construct() 
    {
        $this->middleware('auth');
        $this->middleware('isadmin');
    } # End method __construct

    /**
     * Retorna la vista principal de las categorias
     *
     *  @author Herney
     *
     *  @return view categories.index
     */
    public function index()
    {
        return view('admin.categories.index');
    }  # End method index

    /**
     * Remite la peticion post al modelo
     *
     *  @author Herney
     *
     *  @param CategoryRequest $request
     *  @return view categories.index
     */
    public function saveCategory( CategoryRequest $request )
    {
        $request['icon'] = e( $request['icon'] );
        
        if ( Category::create( $request->all() ) ) {
            return view('admin.categories.index');
        }
    } # End method saveCategory

} # End class CategoryController
