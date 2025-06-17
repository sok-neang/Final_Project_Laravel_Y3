<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index(Request $request){

        $post = Post::when($request->category_id, function ($query, $category_id){
            $query->where('category_id', $category_id);
        })
        
        ->when($request->name ?? $request->tag_id ?? $request->category_id, function ($query, $search) use ($request) {
            if ($request->has('name')) {
                $query->where('title', 'like', '%' . $search . '%');
            }

            if ($request->has('tag_id')) {
                $query->whereHas('tags', function($sub_query) use ($search) {
                    $sub_query->where('id', $search);
                });
            }

            if ($request->has('category_id')) {
                $query->where('category_id', $search);
            }
        })

        ->when($request->tag_id, function ($query, $tag_id){
            $query->whereHas('tags', function($sub_query) use($tag_id){
                $sub_query->where('id', $tag_id);
            });
        })
        ->paginate(8);

        return view('index', ['posts' => $post]);
    }

    public function article(Request $request, $id){
        $post = Post::findOrFail($id);
        return view('article', compact('post'));
    }
}