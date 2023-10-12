<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Repositories\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }


    public function index()
    {
        $data = $this->productService->all();
        return view('admin.product.index', compact('data'));
    }


    public function create()
    {
        $product_categories = ProductCategory::pluck('name','id');
        return view('admin.product.create',compact('product_categories'));
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $category = ProductCategory::find($request->product_category_id);
        $file = $request->file('image');
        $filename = $file->getClientOriginalName();
        $path = 'product/'.$category->slug.'/';
        $file->storeAs('public/'.$path,$filename);
        $data['image'] = 'storage/'.$path.$filename;
        $data['slug'] = Str::slug($request->name);
        $this->productService->store($data);
        return redirect()->route('product.index')->with('success','Product has success created');
    }


    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }


    public function edit(Product $product)
    {
        $product_categories = ProductCategory::pluck('name','id');
        return view('admin.product.edit', compact('product','product_categories'));
    }


    public function update(Request $request, Product $product)
    {
        $data = $request->all();
        $category = ProductCategory::find($request->product_category_id);
        if( $file = $request->file('image')){
            $filename = $file->getClientOriginalName();
            $path = 'product/'.$category->slug.'/';
            $file->storeAs('public/'.$path,$filename);
            $data['image'] = 'storage/'.$path.$filename;
        }
        $data['slug'] = Str::slug($request->name);
        $this->productService->update($data,$product->id);
        return redirect()->route('product.index')->with('success','Product has success updated');
    }


    public function destroy(Product $product)
    {
        $this->productService->destroy($product->id);
        return redirect()->route('product.index')->with('success','Product has success deleted');
    }

    public function dataTable()
    {
        return $this->productService->dataTable();
    }
}
