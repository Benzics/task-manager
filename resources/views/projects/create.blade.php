@extends('base')

@section('title', 'Create Project')
@section('content')
    <section class="container">
        <h2 class="my-3">Create New Project</h2>
        <form action="{{ route('projects.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Project Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Project name" required="" />
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
            
        </form>
    </section>
@endsection
