<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRequest;
use App\Http\Requests\Admin\UpdateRequest;
use App\Models\Product;
use App\Services\Admin\Service;


class ProductController extends Controller
{
    public $sevice;
    public function __construct(Service $service)
    {
        $this->service=$service;
    }

    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.index',compact('products'));
    }
    public function create()
    {
        return view('admin.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);

        return redirect()->route('admin.product.index');
    }
    public function edit(Product $product)
    {

        return view('admin.edit', compact('product'));
    }

    public function update(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();
        $this->service->update($product, $data);

        return redirect()->route('admin.product.index');
    }

    public function delete(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.product.index');
    }
}
