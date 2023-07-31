<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified task.
     */
    public function update(TaskRequest $request, int $id)
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
