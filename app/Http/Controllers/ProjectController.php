<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;

class ProjectController extends Controller
{
    /**
     * Display a listing of the projects
     */
    public function index(): View
    {
        return view('projects.index');
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
