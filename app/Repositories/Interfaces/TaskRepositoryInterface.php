<?php

namespace App\Repositories\Interfaces;

use App\Models\Task;
use Ramsey\Uuid\Uuid;

interface TaskRepositoryInterface
{
    public function getAllTasks();
    public function getTaskById(Uuid $taskId);
    public function deleteTask(Uuid $taskId);
    public function createTask(Task $task);
    public function updateTask($taskId, array $newDetails);

    public function getIncompleteTasks();
    public function getCompletedTasks();
}
