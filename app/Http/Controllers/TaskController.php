<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Session::get('tasks');
        if (Session::has("tasks")) {

            if (is_a($tasks, Task::class)) {
                $tasks = array($tasks);
            }
            return view("task.view", [
                "tasks" => $tasks
            ]);
        }

        return view("task.view");
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

        if (Session::has("tasks")) {
            $tasks  = array(Session::get("tasks"));
            array_push($tasks, $task);
            Session::put('tasks', $tasks);
        } else {
            Session::put('tasks', $task);
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
