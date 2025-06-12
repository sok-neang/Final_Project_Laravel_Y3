<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Tag; // Ensure you import the Category model
use App\Http\Controllers\Controller; // Import the base controller class    

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all(); // Fetch all tags

        return view('Admin.tag.index', ['tags' => $tags]);
    }
    public function create()
    {
        return view('Admin.tag.create');
    }
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        // dd($category);
        return view('Admin.tag.edit', ['tag' => $tag]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        // write to database
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->save();
        
        // return or redirect here
        return redirect()->route('Admin.tag.index')->with('success', 'Tag created successfully.');
    }

    public function update(Request $request, $id){
        $tag = Tag::findOrFail($id); // query tag in database tha vea mean or not
        $tag->name = $request->name; // if it have then update it
        $tag->save();
        return redirect()->route('Admin.tag.index')->with('success', 'Tag updated successfully.');  // return or redirect here
    }

    public function delete(Request $request, $id){
        $tag = Tag::findOrFail($id);
        $tag->delete(); // delete tag
        return redirect()->route('Admin.tag.index')->with('success', 'Tag deleted successfully.'); // return or redirect here
    }

}