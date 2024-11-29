<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Task $task)
    {
        $tasks = Task::with('user')->paginate(5);

        return view('tasks.index', compact(['tasks']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $task = new Task();
        $task->subject = $request->input('subject');
        $task->description = $request->input('description');
        $task->priority = $request->input('priority');
        $task->status = $request->input('status');
        $task->end_date = $request->input('end_date');
        $task->user_id = Auth::user()->id;
        $task->save();

        return Redirect::route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task)
    {
        $task->subject = $request->input('subject');
        $task->description = $request->input('description');
        $task->priority = $request->input('priority');
        $task->status = $request->input('status');
        $task->end_date = $request->input('end_date');
        $task->user_id = Auth::user()->id;
        $task->update();

        return Redirect::route('tasks.show', compact('task'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return Redirect::route('tasks.index');
    }
}
