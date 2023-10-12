<?php

namespace App\Http\Controllers;

use App\Models\ProductFile;
use App\Repositories\ProductFileService;
use Illuminate\Http\Request;

class ProductFileController extends Controller
{
    private $productfileService;

    public function __construct(ProductFileService $productfileService)
    {
        $this->productfileService = $productfileService;
    }


    public function index()
    {
        $data = $this->productfileService->all();
        return view('admin.productfile.index', compact('data'));
    }


    public function create()
    {
        return view('admin.productfile.create');
    }


    public function store(Request $request)
    {
        $this->productfileService->store($request->all());
        return redirect()->route('productfile.index')->with('success','ProductFile has success created');
    }


    public function show(ProductFile $productfile)
    {
        return view('admin.productfile.show', compact('productfile'));
    }


    public function edit(ProductFile $productfile)
    {
        return view('admin.productfile.edit', compact('productfile'));
    }


    public function update(Request $request, ProductFile $productfile)
    {
        $this->productfileService->update($request->all(),$productfile->id);
        return redirect()->route('productfile.index')->with('success','ProductFile has success updated');
    }


    public function destroy(ProductFile $productfile)
    {
        $this->productfileService->destroy($productfile->id);
        return redirect()->route('productfile.index')->with('success','ProductFile has success deleted');
    }

    public function dataTable()
    {
        return $this->productfileService->dataTable();
    }
}