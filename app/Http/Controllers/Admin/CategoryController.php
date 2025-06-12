<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Category; // Ensure you import the Category model
use App\Http\Controllers\Controller; // Import the base controller class

class CategoryController extends Controller
{
    public function index()
    {
        $cotegories = Category::all(); // Fetch all categories
        return view('Admin.Category.index', ['categories' => $cotegories]);
    }
    public function create()
    {
        return view('Admin.Category.create');
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        // dd($category);
        return view('Admin.Category.edit', ['category' => $category]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        // write to database
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        
        // return or redirect here
        return redirect()->route('Admin.Category.index')->with('success', 'Category created successfully.');
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $category = Category::findOrFail($id); // query category in database tha vea mean or not
        $category->name = $request->name; // if it have then update it
        $category->save();
        return redirect()->route('Admin.Category.index')->with('success', 'Category updated successfully.');  // return or redirect here
    }

    public function delete(Request $request, $id){
        $request->validate([
            'id' => 'required|integer|exists:categories,id',
        ]);
        $category = Category::findOrFail($id);
        $category->delete(); // delete category
        return redirect()->route('Admin.Category.index')->with('success', 'Category deleted successfully.'); // return or redirect here
    }

}