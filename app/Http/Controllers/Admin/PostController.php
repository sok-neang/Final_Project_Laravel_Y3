<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post; // Ensure you import the Post model
use App\Models\Category; // Import the Category model
use App\Models\Tag; // Import the Tag model
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all(); // Fetch all posts
        return view('Admin.post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all(); // Fetch all categories
        $tags = Tag::all(); // Fetch all tags
        return view('Admin.post.create', ['categories' => $categories, 'tags' => $tags]);   // Pass categories and tags to the view if needed
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        DB::transaction(function () use ($request) {
            $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'thumbnail' => 'required|mimes:jpg,jpeg,png|max:2048', // Optional thumbnail validation
            'category_id' => 'required|exists:categories,id',
        ]);

        $fileName = time().'_'.$request->thumbnail->getClientOriginalName();
        $filePath = $request->file('thumbnail')->storeAs('uploads', $fileName, 'public');
            
            $post = new Post();
            $post->user_id = auth()->id(); // Assuming you want to set the authenticated user ID
            $post->title = $request->title;
            $post->content = $request->content;
            $post->thumbnail = $filePath; // Store the file path
            $post->category_id = $request->category_id;
            $post->save();   

            $post->tags()->sync($request->tags); //save relationship one to many
        });

        return redirect()->route('Admin.post.index')->with('success', 'Post created successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all(); 
        // dd($post);
        return view('Admin.post.edit', ['post' => $post, 'categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try{
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'thumbnail' => 'nullable|mimes:jpg,jpeg,png|max:2048', // Optional thumbnail validation
            'category_id' => 'required|exists:categories,id',
        ]);

        $post = Post::findOrFail($id);
        $post->user_id = auth()->id(); // Assuming you want to set the authenticated user ID
        $post->title = $request->title;
        $post->content = $request->content;

        if ($request->hasFile('thumbnail')) {
            //ToDO:: implement has file delete
            
            $fileName = time().'_'.$request->thumbnail->getClientOriginalName();
            $filePath = $request->file('thumbnail')->storeAs('uploads', $fileName, 'public');
            $post->thumbnail = $filePath; // Update the file path
        }

        $post->category_id = $request->category_id;
        $post->save();

        $post->tags()->sync($request->tags); // Update the tags relationship
        
        DB::commit();
        return redirect()->route('Admin.post.index')->with('success', 'Post updated successfully!');
        }
        catch(\Throwable $th){
            DB::rollBack();
            throw $th; // Handle the exception as needed
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}