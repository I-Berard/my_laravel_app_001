<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Task::where('user_id', Auth::id())->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
        ]);

        $data['user_id'] = Auth::id();
        $data['is_comleted'] = false;

        return Task::create($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
        $this->authorizeTask($task);
        return $task;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
        $this->authorizeTask($task);

        $data = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'is_completed' => 'boolean',
        ]);

        $task->update($data);
        return $task;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
        $this->authorizeTask($task);
        $task->delete();

        return response()->json(['message' => 'Task deleted']);
    }

    public function authorizeTask(Task $task){
        if ($task->user_id !== Auth::id()) {
            abort(403, 'Unauthorised action');
        }
    }
}
