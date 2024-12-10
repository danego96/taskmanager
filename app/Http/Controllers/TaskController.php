<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Builder;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Task $task, Request $request)
    {
        $priorities = ['low', 'medium', 'high', 'urgent'];
        $statuses = ['draft', 'open', 'in progress', 'completed'];

        $created_by = $request->query('created_by');
        $sort = $request->input('sort', '');
        $filters = $request->only(['priority', 'status']);
        $tasks = Task::with('user')
            ->when($request->query('priority'), fn(Builder $query, $priority) => $query->where('priority', $priority))
            ->when($request->query('status'), fn(Builder $query, $status) => $query->where('status', $status))
            ->when($created_by, function (Builder $query, $created_by) {
                $query->whereHas('user', function (Builder $query) use ($created_by) {
                    $query->where('name', $created_by);
                });
            });



        match ($sort) {
            'end_date' => $tasks->orderBy('end_date', 'asc'),
            'status' => $tasks->orderBy('status', 'asc'),
            'priority' => $tasks->orderBy('priority', 'asc'),
            default => $tasks->orderBy('id', 'asc'),
        };

        $tasks = $tasks->paginate(5)->appends($request->all());

        return view('tasks.index', compact(['tasks', 'priorities', 'statuses', 'sort', 'filters', 'created_by']));
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

    public function destroy(Task $task)
    {
        $task->delete();

        return Redirect::route('tasks.index');
    }

    public function search(Request $request)
    {
        $q = $request->input('q');
        $tasks = Task::with('user')
            ->where('subject', 'like', "%$q%")
            ->orWhere('description', 'like', "%$q%")
            ->orwhereHas('user', function (Builder $query) use ($q) {
                $query->where('name', 'like', "%$q%");
            });

        $tasks = $tasks->paginate(5)->appends($request->all());

        return view('tasks.search', compact('tasks'));
    }
}
