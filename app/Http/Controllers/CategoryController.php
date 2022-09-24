<?php

namespace App\Http\Controllers;

use App\Category;

use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('admin.category.index', compact('categories'));

    }
//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

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(StoreRequest $request)
    {
        Category::crate($request->all());
        return redirect()->route('categories.index');
    }


    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }


    public function update(UpdateRequest $request, Category $category)
    {
      $category->update($request->all());
      return redirect()->route('categories.index');
    }


    public function destroy(Category $category)
    {
        $category->delete();
    }
}
