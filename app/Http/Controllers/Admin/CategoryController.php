<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
            'slug' => 'required'
        ]);

        Category::create($request->all());
        $categories = Category::all();

        return redirect()->route('admin.categories.index', compact('categories'))->with('info', 'Category created succesfully!');
    }

    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => "required|unique:categories,name,$category->id",
            'slug' => 'required'
        ]);

        $category->update($request->all());
        $categories = Category::all();

        return redirect()->route('admin.categories.index', compact('categories'))->with('info', 'Category updated succesfully!');

    }

    public function destroy(Category $category)
    {
        $category->delete();

        $categories = Category::all();

        return redirect()->route('admin.categories.index', compact('categories'))->with('info', 'Category deleted succesfully!');
    }
}
