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
     * Display the specified project.
     */
    public function show(string $id): View
    {
        $project = Project::findOrFail($id);
        $tasks = Task::where('project_id', $id)->orderBy('priority', 'ASC')->get();

        return view('projects.show', compact('project', 'tasks'));
    }
}
