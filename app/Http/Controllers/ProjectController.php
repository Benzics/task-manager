<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;

class ProjectController extends Controller
{
    /**
     * Display a listing of the projects
     */
    public function index(): View
    {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new project
     */
    public function create(): View
    {
        return view('projects.create');
    }

    /**
     * Store a newly created project in database.
     */
    public function store(ProjectRequest $request): RedirectResponse
    {
        // We get our validated project name and save it
        $validated = $request->validated();

        $project = new Project;

        $project->name = $validated['name'];

        $project->save();

        return redirect(route('projects.index'))->with('success', 'Project created successfully');
    }

    /**
     * Display the form for editing the project
     */
    public function edit(int $id): View
    {
        $project = Project::findOrFail($id);

        return view('projects.edit', compact('project'));
    }

    /**
     * Store a newly created project in database.
     */
    public function update(ProjectRequest $request, int $id): RedirectResponse
    {
        // We get our validated project name and save it
        $validated = $request->validated();

        $project = Project::findOrFail($id);

        $project->name = $validated['name'];

        $project->save();

        return redirect(route('projects.show', ['project' => $project->id]))->with('success', 'Project updated successfully');
    }

    /**
     * Display the specified project.
     */
    public function show(string $id): View
    {
        $project = Project::findOrFail($id);
        $tasks = Task::where('project_id', $id)->orderBy('priority', 'ASC')->get();

        return view('projects.show', compact('project', 'tasks'));
    }

    /**
     * Delete a project and all associated tasks
     */
    public function destroy(int $id): RedirectResponse
    {
        $project = Project::findOrFail($id);

        $project->delete();

        return redirect(route('projects.index'))->with('success', 'Project Deleted Successfully');
    }

}
