@extends('base')

@section('title', 'Edit Project')
@section('content')
    <section class="container">
        <h2 class="my-3">Edit Project</h2>
        <form action="{{ route('projects.update', ['project' => $project->id]) }}" method="post">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="name">Project Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Project name" value="{{ $project->name }}" required="" />
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Edit</button>
            </div>
            
        </form>
    </section>
@endsection
