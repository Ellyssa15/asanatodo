<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;
use App\Models\User;
use Carbon\Carbon;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class TaskController extends Controller
{
    public function create()
    {
        $users = User::whereRole('user')->get();
        return view('task', compact('users'));
    }

    public function store(Request $request)
    {
        $task = new Tasks;
        $task->name = $request->name;
        $task->assignee = User::find($request->assignee)->name;
        $task->due_date = $request->due_date;
        $task->status = 'To-Do';
        $task->save();

        return redirect()->route('task')->with('success', 'Task created successfully.');
    }

    public function list()
    {
        $user = auth()->user();
        if ($user && $user->role == 'user') {
            $tasks = Tasks::where('assignee', $user->name)->get();
        } else {
            $tasks = Tasks::all();
        }
        $users = User::whereRole('user')->get();
        return view('task', compact('tasks', 'users'));
    }

    public function delete_task($id)
    {
        $data = Tasks::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function update_task(Request $request)
    {
        $tasks = Tasks::find($request->id);

        if ($tasks) {
            if ($tasks->status === 'To-Do') {
                $tasks->status = 'Completed';
            } else {
                $tasks->status = 'To-Do';
            }
            $tasks->save();

            return redirect()->back();
        }
    }
}
