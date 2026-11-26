<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('tasks', compact('tasks'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:10',
        ]);

        $task = new Task;
        $task->name = $request->name;
        $task->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->back();
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $tasks = Task::all();

        return view('tasks', compact('task', 'tasks'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:10',
        ]);

        $task = Task::findOrFail($request->id);
        $task->name = $request->name;
        $task->save();

        return redirect('tasks');
    }
}
