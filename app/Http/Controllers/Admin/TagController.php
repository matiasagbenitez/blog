<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.tags.index')->only('index');
        $this->middleware('can:admin.tags.create')->only('create');
        $this->middleware('can:admin.tags.edit')->only('edit', 'update');
        $this->middleware('can:admin.tags.delete')->only('destroy');
    }

    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        $colors = [
            'red' => 'Red',
            'yellow' => 'Yellow',
            'green' => 'Green',
            'blue' => 'Blue',
            'indigo' => 'Indigo',
            'orange' => 'Orange',
            'purple' => 'Violet',
            'pink' => 'Pink',
            'gray' => 'Gray'
        ];

        return view('admin.tags.create', compact('colors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tags',
            'slug' => 'required',
            'color' => 'required'
        ]);

        Tag::create($request->all());
        $tags = Tag::all();

        return redirect()->route('admin.tags.index', compact('tags'))->with('info', 'Tag created succesfully!');
    }

    public function edit(Tag $tag)
    {
        $colors = [
            'red' => 'Red',
            'yellow' => 'Yellow',
            'green' => 'Green',
            'blue' => 'Blue',
            'indigo' => 'Indigo',
            'orange' => 'Orange',
            'purple' => 'Violet',
            'pink' => 'Pink',
            'gray' => 'Gray'
        ];

        return view('admin.tags.edit', compact('tag', 'colors'));
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => "required|unique:tags,name,$tag->id",
            'slug' => 'required',
            'color' => 'required'
        ]);

        $tag->update($request->all());
        $tags = Tag::all();

        return redirect()->route('admin.tags.index', compact('tags'))->with('info', 'Tag updated succesfully!');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        $tags = Tag::all();
        return redirect()->route('admin.tags.index', compact('tags'))->with('info', 'Tag deleted succesfully!');
    }

}
