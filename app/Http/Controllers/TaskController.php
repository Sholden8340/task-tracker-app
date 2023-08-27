<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // retrieve tasks

        if (session()->has("tasks")) {
            $tasks = session("tasks");
        }

        return view("task.view", [
            "tasks" => $tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("task.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation
        // not null
        // valid user? ??

        $request->validate([
            'name' => ['required', 'max:255'],
            // 'description' => ['required'],
        ]);

        // store

        $task = new Task([
            "name" => $request->name,
            "description" => $request->description,
            'is_complete' => false,
        ]);


        if (session()->has("tasks")) {
            session()->push("tasks", $task);
        } else {
            session([
                "tasks" => [$task]
            ]);
        }

        return redirect()->route("task");
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
