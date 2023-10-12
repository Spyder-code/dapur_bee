<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Repositories\ProductCategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    private $productcategoryService;

    public function __construct(ProductCategoryService $productcategoryService)
    {
        $this->productcategoryService = $productcategoryService;
    }


    public function index()
    {
        $data = $this->productcategoryService->all();
        return view('admin.product_category.index', compact('data'));
    }


    public function create()
    {
        return view('admin.product_category.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $this->productcategoryService->store($data);
        return redirect()->route('product-category.index')->with('success','ProductCategory has success created');
    }


    public function show(ProductCategory $productcategory)
    {
        return view('admin.product_category.show', compact('productcategory'));
    }


    public function edit(ProductCategory $product_category)
    {
        return view('admin.product_category.edit', compact('product_category'));
    }


    public function update(Request $request, ProductCategory $product_category)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $this->productcategoryService->update($data,$product_category->id);
        return redirect()->route('product-category.index')->with('success','ProductCategory has success updated');
    }


    public function destroy(ProductCategory $product_category)
    {
        $this->productcategoryService->destroy($product_category->id);
        return redirect()->route('product-category.index')->with('success','ProductCategory has success deleted');
    }

    public function dataTable()
    {
        return $this->productcategoryService->dataTable();
    }
}
