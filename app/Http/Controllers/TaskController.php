<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use App\Repositories\TaskRepository;
use PHPUnit\Framework\TestStatus\Incomplete;

class TaskController extends Controller
{

    private TaskRepositoryInterface $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = $this->taskRepository->getAllTasks();
        return view("task.view", [
            "tasks" => $tasks,
            "heading" => "All Tasks"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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

        $this->taskRepository->createTask($task);
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
    public function edit($taskId)
    {
        $task = $this->taskRepository->getTaskById($taskId);
        return view("task.edit", [
            "task" => $task,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $taskId)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            // 'description' => ['required'],
        ]);
        $this->taskRepository->updateTask($taskId, [
            "name" => $request->name,
            "description" => $request->description,

        ]);

        return redirect()->route("task");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($taskId)
    {
        $this->taskRepository->deleteTask($taskId);
        return back();
    }

    public function markAsComplete($taskId)
    {
        $this->taskRepository->updateTask($taskId, ["is_complete" => true]);
        return back();
    }

    public function markAsIncomplete($taskId)
    {
        $this->taskRepository->updateTask($taskId, ["is_complete" => false]);
        return back();
    }

    public function incompleteTasksIndex()
    {
        $tasks = $this->taskRepository->getIncompleteTasks();
        return view("task.view", [
            "tasks" => $tasks,
            "heading" => "Incomplete Tasks"
        ]);
    }

    public function completedTasksIndex()
    {
        $tasks = $this->taskRepository->getCompletedTasks();
        return view("task.view", [
            "tasks" => $tasks,
            "heading" => "Completed Tasks"
        ]);
    }
}
