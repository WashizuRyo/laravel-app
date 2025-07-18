<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Tag;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = Task::query();

        if ($request->has('tag')) {
            $tagName = $request->query('tag');
            
            $query->whereHas('tags', function ($q) use ($tagName) {
                $q->where('name', $tagName);
            });
        }

        $tasks = $query->orderBy('completed_at')->orderBy('title')->get();

        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function create()
    {
        $tags = Tag::all();
        return view('tasks.create', ['tags' => $tags]);
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required']);
        $task = Task::create(['title' => $request->title]);
        $task->tags()->attach($request->tags);

        return redirect()->route('tasks.index');
    }

    public function show(Task $task)
    {
        return view('tasks.show', ['task' => $task]);
    }

    public function edit(Task $task)
    {
        $tags = Tag::all();
        return view('tasks.edit', [
            'task' => $task,
            'tags' => $tags
        ]);
    }

    public function update(Request $request, Task $task)
    {
        $request->validate(['title' => 'required']);

        $task->update([
            'title' => $request->title,
            'completed_at' => $request->has('completed') ? now() : null,
        ]);
        $task->tags()->sync($request->tags ?? []);

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
