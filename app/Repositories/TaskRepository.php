<?php

namespace App\Repositories;

use App\Models\DemoList;

class TaskRepository
{
    public function getAllTasks($taskStatus = null)
    {
        $query = DemoList::query();

        if ($taskStatus !== null) {
            $query->where('TaskStatus', $taskStatus);
        }

        return $query->get();
    }

    public function createTask($data)
    {
        $data['TaskStatus'] = false;
        $data['TaskDelete'] = false;

        return DemoList::create($data);
    }

    public function findTask($id)
    {
        return DemoList::find($id);
    }

    public function updateTask($id, $data)
    {
        $task = $this->findTask($id);

        if ($task) {
            $task->update($data);
        }

        return $task;
    }

    public function markTaskAsDone($id)
    {
        $task = $this->findTask($id);

        if ($task) {
            $task->TaskStatus = true;
            $task->save();
        }

        return $task;
    }

    public function markTaskAsDeleted($id)
    {
        $task = $this->findTask($id);

        if ($task) {
            $task->TaskDelete = true;
            $task->save();
        }

        return $task;
    }

    public function deleteTask($id)
    {
        $task = $this->findTask($id);

        if ($task) {
            $task->delete();
        }

        return $task;
    }
}
