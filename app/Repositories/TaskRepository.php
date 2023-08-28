<?php

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Interfaces\TaskRepositoryInterface;

class TaskRepository implements TaskRepositoryInterface
{

    private Collection $taskCollection;

    public function __construct()
    {
        $this->taskCollection = new Collection();
        $this->retrieveFromSession();
    }

    public function __destruct()
    {
        $this->storeInSession();
    }

    public function getAllTasks()
    {
        return $this->taskCollection->all();
    }

    public function getTaskById($taskId)
    {
        return $this->taskCollection->findOrFail($taskId);
    }

    public function deleteTask($taskId)
    {
        $this->taskCollection->destroy($taskId);
    }

    public function createTask(Task $task)
    {
        $this->taskCollection->add($task);
        $this->storeInSession();
    }

    public function updateTask($taskId, array $newDetails)
    {
        $task = $this->taskCollection->find($taskId);
        // $task = $task->update($newDetails);

        foreach ($newDetails as $key => $value) {
            $task[$key] = $value;
        }
        // dd($task);
        $this->taskCollection->replace($task);
    }

    public function getCompletedTasks()
    {
        // return $this->taskCollection->where("is_completed", true)->get();
    }

    public function getIncompleteTasks()
    {
    }

    private function storeInSession()
    {
        Session::put('tasks', $this->taskCollection);
    }

    private function retrieveFromSession()
    {
        $tasks = Session::get('tasks');
        if (!empty($tasks)) {
            $this->taskCollection = $tasks;
        }
    }
}