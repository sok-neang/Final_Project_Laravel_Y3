<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the posts.
     */
    public function index()
    {
        $posts = Post::all();
        return view('Admin.post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new post.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('Admin.post.create', [
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    /**
     * Store a newly created post in storage.
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'description' => 'nullable|string|max:500',
                'thumbnail' => 'required|mimes:jpg,jpeg,png|max:2048',
                'category_id' => 'required|exists:categories,id',
                'tags' => 'array|nullable'
            ]);

            $fileName = time() . '_' . $request->thumbnail->getClientOriginalName();
            $filePath = $request->file('thumbnail')->storeAs('uploads', $fileName, 'public');

            $post = new Post();
            $post->user_id = auth()->id();
            $post->title = $request->title;
            $post->content = $request->content;
            $post->description = $request->description;
            $post->thumbnail = $filePath;
            $post->category_id = $request->category_id;
            $post->save();

            if ($request->has('tags')) {
                $post->tags()->sync($request->tags);
            }
        });

        return redirect()->route('Admin.post.index')->with('success', 'Post created successfully!');
    }

    /**
     * Show the form for editing the specified post.
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();

        return view('Admin.post.edit', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    /**
     * Update the specified post in storage.
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'description' => 'nullable|string|max:500',
                'thumbnail' => 'nullable|mimes:jpg,jpeg,png|max:2048',
                'category_id' => 'required|exists:categories,id',
                'tags' => 'array|nullable'
            ]);

            $post = Post::findOrFail($id);
            $post->user_id = auth()->id();
            $post->title = $request->title;
            $post->content = $request->content;
            $post->description = $request->description;

            if ($request->hasFile('thumbnail')) {
                $fileName = $request->thumbnail->getClientOriginalName();
                $filePath = $request->file('thumbnail')->storeAs('uploads', $fileName, 'public');
                $post->thumbnail = $filePath;
            }

            $post->category_id = $request->category_id;
            $post->save();

            if ($request->has('tags')) {
                $post->tags()->sync($request->tags);
            }

            DB::commit();
            return redirect()->route('Admin.post.index')->with('success', 'Post updated successfully!');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Remove the specified post from storage.
     */
    public function destroy($id)
    {
        // You can implement this when needed.
    }
}