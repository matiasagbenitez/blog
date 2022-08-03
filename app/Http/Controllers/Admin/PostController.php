<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index');
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->all());

        if ($request->file('file')) {
            $url = Storage::put('public/posts', $request->file('file'));
            $post->image()->create([
                'url' => $url
            ]);
        }

        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }

        // Cache::flush();

        return redirect()->route('admin.posts.index')->with('info', 'Post created succesfully!');
    }

    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {
        // $this->authorize('author', $post);

        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(StorePostRequest $request, Post $post)
    {
        // $this->authorize('author', $post);
        $post->update($request->all());

        if ($request->file('file')) {

            $url = Storage::put('public/posts', $request->file('file'));

            if ($post->image) {
                Storage::delete($post->image->url);
                $post->image->update([
                    'url' => $url
                ]);
            } else {
                $post->image()->create([
                    'url' => $url
                ]);
            }
        }

        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }

        // Cache::flush();

        return redirect()->route('admin.posts.index')->with('info', 'Post updated succesfully!');
    }

    public function destroy(Post $post)
    {
        // $this->authorize('author', $post);
        $post->delete();
        // Cache::flush();
        return redirect()->route('admin.posts.index')->with('info', 'Post deleted succesfully!');
    }
}
