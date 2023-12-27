<?php

namespace App\Http\Controllers;

use App\Events\TaskUpdateEvent;
use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }

    public function new()
    {
        return view('tasks.new');
    }

    public function edit(Request $request)
    {
        $task = Task::find($request->id);

        return view('tasks.edit', compact('task'));
    }

    public function create(Request $request)
    {
        if ($this->user_role() != 'Admin') {
            return redirect()->route('login')->with('error', 'Unauthorized access.');
        }

        $this->validate($request, ['title' => 'required',
        'description' => 'required',
        'status' => 'required|in:To Do,In Progress,Completed',
    ]);

        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('tasks')->with('success', 'Task created successfully');
    }

    public function update(Request $request)
    {
        if ($this->user_role() != 'Admin' || $this->user_role() != 'Manager') {
            return redirect()->route('login')->with('error', 'Unauthorized access.');
        }

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'status' => 'required|in:To Do,In Progress,Completed',
        ]);

        $task = Task::find($request->id);
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        event(new TaskUpdateEvent($task));

        return redirect()->route('tasks');
    }

    public function destroy(Request $request)
    {
        if ($this->user_role() != 'Admin') {
            return redirect()->route('login')->with('error', 'Unauthorized access.');
        }

        $task = Task::find($request->id);
        $task->delete();

        return redirect()->route('tasks')->with('success', 'Task deleted successfully.');
    }

    private function user_role()
    {
        return auth()->user()->role;
    }
}
