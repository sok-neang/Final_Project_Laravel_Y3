<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Routing\Controller;
use App\Models\Category;
use App\Models\Tag;

class HomeController extends Controller
{
    public function index(){
        $posts = Post::paginate(8);
        $categories = Category::all();
        $tags = Tag::all();
        return view('index', ['posts' => $posts, 'nav_categories'=> $categories, 'tags'=>$tags]);
    }

    public function article(Request $request, $id){
        $post = Post::findOrFail($id);
        return view('article', compact('post'));
    }
}