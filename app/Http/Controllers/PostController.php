<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 2)->latest('id')->paginate(11);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Post $post)
    {
        $relateds = Post::where('category_id', $post->category_id)->where('status', 2)->where('id', '!=', $post->id)->latest('id')->take(4)->get();
        return view('posts.show', compact('post', 'relateds'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function category(Category $category)
    {
        $posts = Post::where('category_id', $category->id)->where('status', 2)->latest()->paginate(11);
        return view('posts.category', compact('posts', 'category'));
    }
}
