<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Auth::user()->tasks()->orderBy('is_completed')->orderByDesc('created_at')->paginate(5);
        return view('tasks',compact('tasks'));
    }
    public function store(Request $request)
    {
        $data = $this->validate($request,[
            'title' => 'required|string|max:255',
        ]);
        Auth::user()->tasks()->create([
            'title' => $data['title'],
            'is_completed' => false,
        ]);
        session()->flash('status','Task Created');
        return redirect('/tasks');
    }
    public function update(Task $task)
    {
        $this->authorize('complete',$task);
        $task->is_completed = true;
        $task->save();
        session()->flash('status','Task Completed');
        return redirect('/tasks');
    }
}
