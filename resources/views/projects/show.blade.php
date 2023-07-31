@extends('base')

@section('title', 'View task')

@section('content')
<style>
    ul, li { margin: 0; padding: 0; list-style: none;}
</style>
<section class="container">
    <h1 class="text-center">Project name</h1>
    <div class="row">
        <div class="col-md-6">
            <h3 class="mb-4">Tasks</h3>
            <ul>
                <li class="bg-dark p-2 mb-2 text-white d-flex">
                    <b class="mr-2">#1</b>
                    <span>Task one</span>
                    <div class="ml-auto">
                        <a href="#" title="Edit" class="btn btn-outline-success">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-outline-danger" title="delete">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </li>
                <li class="bg-dark p-2 mb-2 text-white d-flex">
                    <b class="mr-2">#2</b>
                    <span>Task one</span>
                    <div class="ml-auto">
                        <a href="#" title="Edit" class="btn btn-outline-success">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-outline-danger" title="delete">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </li>

                <li class="bg-dark p-2 mb-2 text-white d-flex">
                    <b class="mr-2">#3</b>
                    <span>Task one</span>
                    <div class="ml-auto">
                        <a href="#" title="Edit" class="btn btn-outline-success">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-outline-danger" title="delete">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </li>
            </ul>
        </div>

        <div class="col-md-6">
            <h3 class="mb-4">Add new task</h3>
            <form action="">
                @csrf
                <div class="form-group">
                    <label for="name">Task name</label>
                    <input type="text" class="form-control" name="name" placeholder="Task name" />
                </div>

                <div class="form-group">
                    <button class="btn btn-primary">Add Task</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection