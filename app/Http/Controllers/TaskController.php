<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $projectId = $validated['project_id'];

        $project = Project::findOrFail($projectId);
        $priorityLast = count($project->tasks);
        $priority = $priorityLast + 1;

        $task = new Task;

        $task->name = $validated['name'];
        $task->project_id = $projectId;
        $task->priority = $priority;

        $task->save();

        return redirect(route('projects.show', ['project' => $projectId]))
                ->with('success', 'Task successfully added');
    }

    /**
     * Update the specified task.
     */
    public function update(TaskRequest $request, int $id): RedirectResponse
    {
        $validated = $request->validated();

        $projectId = $validated['project_id'];

        $task = Task::findOrFail($id);

        $task->name = $validated['name'];

        $task->save();

        return redirect(route('projects.show', ['project' => $projectId]))
                ->with('success', 'Task updated successfully');
    }

    /**
     * Remove the specified task from project.
     */
    public function destroy(int $id): RedirectResponse
    {
        $task = Task::findOrFail($id);

        $projectId = $task->project->id;

        $task->delete();

        return redirect(route('projects.show', ['project' => $projectId]))
                ->with('success', 'Task deleted successfully');
    }

    /**
     * Reorder the task priority
     */
    public function reOrder(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'taskIds' => 'required'
        ]);

        $taskIds = $validated['taskIds'];

         // Loop through the taskIds and update the priorities accordingly
        foreach ($taskIds as $index => $taskId) {
            $task = Task::find($taskId);
            if ($task) {
                $task->priority = $index + 1; 
                $task->save();
            }
        }

        return response()->json(['message' => 'Tasks reordered successfully.']);
    }
}
