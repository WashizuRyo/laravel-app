<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('completed')
                    ->orderBy('title')
                    ->get();
        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required']);

        Task::create(['title' => $request->title]);
        return redirect()->route('tasks.index');
    }

    public function show(Task $task)
    {
        return view('tasks.show', ['task' => $task]);
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', ['task' => $task]);
    }

    public function update(Request $request, Task $task)
    {
        $request->validate(['title' => 'required']);

        $task->update([
            'title' => $request->title,
            'completed' => $request->has('completed')
        ]);
        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
