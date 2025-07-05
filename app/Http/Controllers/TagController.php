<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::withCount('tasks')->get();
        return view('tags.index', ['tags' => $tags]);
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        Tag::create(['name' => $request->name]);
        
        return redirect()->route('tags.index');
    }

    public function show(Tag $tag)
    {
        $tag->load('tasks');
        return view('tags.show', ['tag' => $tag]);
    }

    public function edit(Tag $tag)
    {
        $tag->load('tasks');
        return view('tags.edit', ['tag' => $tag]);
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate(['name' => 'required']);
        $tag->update(['name' => $request->name]);

        return redirect()->route('tags.index');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tags.index');
    }
}
