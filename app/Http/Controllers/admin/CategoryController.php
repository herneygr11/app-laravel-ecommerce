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
        $this->middleware([
            'auth',
            'isadmin',
            'user.status'
        ]);
    } # End method __construct

    /**
     * Retorna la vista principal de las categorias
     *
     *  @author Herney Ruiz
     *
     *  @return view categories.index
     */
    public function index()
    {
        $categories = Category::orderBy( 'id', 'Desc' )
        ->get();
        
        if (view()->exists('admin.categories.index')){
            return view('admin.categories.index', compact( 'categories' ) );
        }
    }  # End method index

    /**
     * Remite la peticion post al modelo
     *
     *  @author Herney Ruiz
     *
     *  @param CategoryRequest $request
     *  @return view categories.index
     */
    public function saveCategory( CategoryRequest $request )
    {
        $request['icon'] = e( $request['icon'] );
        
        if ( Category::create( $request->all() ) ) {
            return redirect()->route('categories.index');
        }
    } # End method saveCategory

    /**
     * Retonar la vista de editar
     *
     *  @author Herney Ruiz
     *
     *  @param String $slug
     *  @return view categories.index
     */
    public function editCategory(Category $slug)
    {
        $categories = Category::orderBy( 'id', 'Desc' )
        ->get();

        $category = Category::get()->first();

        if ( view()->exists('admin.categories.edit') ){
            return view('admin.categories.edit', compact( 'categories', 'category' ));
        }
    } # End method editCategory

    public function updateCategory( CategoryRequest $request, int $id )
    {
        $category = Category::findOrFail($id);

        if ( $category->update( $request->all() ) ) {
            return redirect()->route('categories.index');
        }
    } # End method updateCategory

    public function deleteCategory( int $id )
    {
        $category = Category::findOrFail($id);

        if ( $category->delete() ) {
            return redirect()->route('categories.index');
        }
    } # End method deleteCategory

} # End class CategoryController
