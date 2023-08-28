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
        return $this->taskCollection->find($taskId);
    }

    public function deleteTask($taskId)
    {
        $task = $this->taskCollection->find($taskId);
        $this->taskCollection->forget($task);
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
        return $this->taskCollection->where('is_complete', '===', true)->all();
    }

    public function getIncompleteTasks()
    {
        return $this->taskCollection->where('is_complete', '===', false)->all();
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
