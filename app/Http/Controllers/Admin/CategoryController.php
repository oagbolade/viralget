<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    //
    function list() {

        $categories = Category::paginate(15);

        return view('admin.categories.list')
            ->with('categories', $categories);
    }

    function add() {
        $categories = Category::all();
        return view('admin.categories.add')
                ->with('categories', $categories);
    }

    function store() {

        request()->validate([
            'categories' => 'required',
        ]);

        $categories = explode(',', request()->categories);
        $parent = request()->has('parent') ? request()->parent : 0;

        foreach($categories as $category) {
            Category::firstOrCreate([
                'name' => $category, 
                'slug' => str_slug($category, '-'), 
                'parent_id' => $parent
            ]);    
        }
                        
        return redirect()->route('admin.categories')->with('status', ['type' => 'success', 'message' => 'Categories added successfully!']);

    }

    public function edit() {
        
        $category = Category::find(request()->id);

        if(!$category) return redirect()->back()->with('status', ['type' => 'error', 'message' => 'Category not found']);

        $categories = Category::all();

        return view('admin.categories.edit')->withCategory($category)->withCategories($categories);
    }

    public function update() {
        $category = Category::find(request()->id);

        if(!$category) return redirect()->back()->with('status', ['type' => 'error', 'message' => 'Category not found']);

        $category->name = request()->category;
        if(request()->has('parent')) {
            $category->parent_id = request()->parent;
        }
        $category->update();

        return redirect()->route('admin.categories')->with('status', ['type' => 'success', 'message' => 'Categories updated successfully!']);
    }
}
