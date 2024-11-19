<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function index(Request $request)
    {
        $taskStatus = $request->query('TaskStatus');
        $tasks = $this->taskRepository->getAllTasks($taskStatus);

        return response()->json($tasks);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'TaskName' => 'required|string|max:255',
            'TaskAbout' => 'required|string|max:255',
        ]);

        $task = $this->taskRepository->createTask($validated);

        return response()->json($task, 201);
    }

    public function show($id)
    {
        $task = $this->taskRepository->findTask($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        return response()->json($task);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'TaskName' => 'string|max:255',
            'TaskAbout' => 'string|max:255',
            'TaskStatus' => 'boolean',
            'TaskDelete' => 'boolean',
        ]);

        $task = $this->taskRepository->updateTask($id, $validated);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        return response()->json($task);
    }

    public function done($id)
    {
        $task = $this->taskRepository->markTaskAsDone($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        return response()->json([
            'message' => 'Task status updated to done',
            'task' => $task
        ]);
    }

    public function DeleteTask($id)
    {
        $task = $this->taskRepository->markTaskAsDeleted($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        return response()->json([
            'message' => 'Task Delete updated to done',
            'task' => $task
        ]);
    }

    public function destroy($id)
    {
        $task = $this->taskRepository->deleteTask($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        return response()->json(['message' => 'Task deleted successfully']);
    }
}
