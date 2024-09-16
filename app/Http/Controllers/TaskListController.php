<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TaskLists;
use Illuminate\Http\Request;

class TaskListController extends Controller
{
    public function index() {
        return view('tasks.index');
    }
 
    public function create() {
        return view('tasks.create');
    }

    public function view() {
        $tasks = TaskLists::all();
        return view('tasks.view.tasks', ['tasks' => $tasks]);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'title'=> 'required',
            'description'=> 'required',
            'status'=> 'required',
            'priority_level'=> 'required',
            'due_date'=> 'required|date',
            'assigned_to'=> 'required',
        ]);

        $newTask = TaskLists::create($data);

        return redirect()->route('tasks')->with('success','Task was stored in tasklist');
    }

    public function update(TaskLists $task) {
        
        return view('tasks.update.tasks', ['task'=>$task]);
        
    }

    public function save(TaskLists $task, Request $request) {
        $data = $request->validate([
            'title'=> 'required',
            'description'=> 'required',
            'status'=> 'required',
            'priority_level'=> 'required',
            'due_date'=> 'required|date',
            'assigned_to'=> 'required',
        ]);

        $task->update($data);

        return redirect()->route('tasksView')->with('success','Updated Successfully');
    }
    
    public function delete(TaskLists $task) {
        $task->delete();

        return redirect()->route('tasksView')->with('delete','Successfully Deleted');
    }
}
