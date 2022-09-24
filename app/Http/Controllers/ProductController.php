<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Provider;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('admin.product.index', compact('products'));

    }
//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

    public function create()
    {
        $categories = Category::get();
        $providers= Provider::get();
        return view('admin.product.create', compact('categories', 'providers'));
    }

    public function store(StoreRequest $request)
    {
        Product::crate($request->all());
        return redirect()->route('products.index');
    }


    public function show(Product $Product)
    {
        return view('admin.product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::get();
        $providers= Provider::get();
        return view('admin.product.show', compact('product', 'categories', 'providers'));
    }


    public function update(UpdateRequest $request, Product $product)
    {
      $product->update($request->all());
      return redirect()->route('products.index');
    }


    public function destroy(Product $product)
    {
        $product->delete();
    }
}
