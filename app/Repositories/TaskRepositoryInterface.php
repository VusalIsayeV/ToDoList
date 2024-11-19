<?php

namespace App\Repositories\Contracts;

use App\Models\DemoList;

interface TaskRepositoryInterface
{
    public function getAllTasks($taskStatus = null);
    public function createTask(array $data);
    public function getTaskById($id);
    public function updateTask($id, array $data);
    public function markTaskAsDone($id);
    public function markTaskAsDeleted($id);
    public function deleteTask($id);
}
