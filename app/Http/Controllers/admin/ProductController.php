<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
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
        $products = Product::with(['category'])->orderBy('id', 'desc')
            ->paginate(20);

        if (view()->exists('admin.products.index')) {
            return view('admin.products.index', compact('products'));
        }
    } # End method index

    public function createProduct()
    {
        $categories = Category::all()->pluck('name', 'id');

        if (view()->exists('admin.products.create')) {
            return view('admin.products.create', compact('categories'));
        }
    } # End method createProduct

    public function saveProduct(ProductCreateRequest $request)
    {
        $request['status'] = 1;

        // preparamos para subir la imagen al servidor
        $path = 'images/products/' . date('Y-m-d');
        $fileExt = trim($request->file('file_image')->getClientOriginalExtension());
        $fileName = rand(1, 999) . '-' . Str::slug($request->name) . '.' . $fileExt;

        $request->file('file_image')->move($path, $fileName);

        $imageMiniature = Image::make($path . '/' . $fileName);
        $imageMiniature->fit(256, 256, function ($constraint) {
            $constraint->upsize();
        });
        $imageMiniature->save($path . '/' . 'm_' . $fileName);

        $request['image'] = $fileName;
        $request['image_path'] = $path;

        if (Product::create($request->all())) {
            return redirect()->route('products.index');
        }
    } # End method saveProduct

    public function editProduct(String $slug)
    {
        $categories = Category::all()->pluck('name', 'id');

        $product =  Product::where('slug', $slug)
            ->first();

        if (view()->exists('admin.products.edit')) {
            return view('admin.products.edit', compact('categories', 'product'));
        }
    } # End method editProduct

    public function updateProduct(ProductUpdateRequest $request, int $id)
    {
        // preparamos para subir la imagen al servidor
        if ($request->hasFile('image')) {
            $path = 'images/products/' . date('Y-m-d');
            $fileExt = trim($request->file('file_image')->getClientOriginalExtension());
            $fileName = rand(1, 999) . '-' . Str::slug($request->name) . '.' . $fileExt;

            $request->file('file_image')->move($path, $fileName);

            $imageMiniature = Image::make($path . '/' . $fileName);
            $imageMiniature->fit(256, 256, function ($constraint) {
                $constraint->upsize();
            });
            $imageMiniature->save($path . '/' . 'm_' . $fileName);

            $request['image'] = $fileName;
            $request['image_path'] = $path;
        }

        $product = Product::findOrFail($id);

        if ($product->update($request->all())) {
            return redirect()->route('products.index');
        }
    } # End method updateProduct

    public function deleteProduct(int $id)
    {
        $product = Product::findOrFail($id);

        if ($product->delete()) {
            return redirect()->route('products.index');
        }
    } # End method deleteProduct

} # End class ProductController
