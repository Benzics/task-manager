@extends('base')

@section('title', 'Projects')

@section('content')
    <section class="container">
        <div class="d-flex my-3">
            <h2>All Projects</h2>
            <aside class="ml-auto"><a href="{{ route('projects.create') }}" class="btn btn-primary">New Project</a></aside>
            
        </div>
        
        <div class="row">
            @forelse ($projects as $project)
                <div class="col-md-4 col-xl-3">
                    <div class="card mb-2">
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->name }}</h5>
                            <p class="card-text">Available tasks: {{ count($project->tasks) }}</p>
                            <a href="{{ route('projects.show', ['project' => $project->id]) }}" class="btn btn-outline-primary">View Project</a>
                        </div>
                    </div>
                </div>
            @empty
            <p>No projects yet</p>
            @endforelse
           
        </div>
    </section>
@endsection