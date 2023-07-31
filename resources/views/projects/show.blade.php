@extends('base')

@section('title', 'View task')

@section('content')
<style>
    ul, li { margin: 0; padding: 0; list-style: none;}
    li {cursor: move;}
</style>
<section class="container">
    <h1 class="text-center mb-5">{{ $project->name }}</h1>
    <div class="row">
        <div class="col-md-6">
            <h3 class="mb-4">Tasks</h3>
            <ul id="taskList">
                @php $priority = 0; @endphp
                @forelse ($tasks as $task)
                    @php $priority++ @endphp

                    <li class="bg-dark p-2 mb-2 text-white d-flex" data-task-id="{{ $task->id }}">
                        <b class="mr-2">#{{ $priority }}</b>
                        <span>{{ $task->name }}</span>
                        <div class="ml-auto">
                            <small>
                                <i class="fas fa-clock"></i> {{ \Carbon\Carbon::parse($task->created_at)->diffForHumans() }}
                            </small>
                            <a href="javascript:void(0)" title="Edit" data-toggle="modal" data-target="#editModal{{$task->id}}" class="btn btn-outline-success">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form style="display: inline" action="{{ route('tasks.destroy', ['task' => $task->id]) }}" onsubmit="return confirm('Are you sure you want to delete this task?')" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-outline-danger" title="delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </li>
                     <!-- Modal -->
                    <div class="modal fade" id="editModal{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Task</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <form method="post" action="{{ route('tasks.update', ['task' => $task->id]) }}" name="form{{ $task->id }}" id="form{{ $task->id }}">
                                @method('put')
                                @csrf
                                <input type="hidden" name="project_id" value="{{ $project->id }}">
                                <div class="form-group">
                                    <label for="name">Task name</label>
                                    <input type="text" class="form-control" value="{{ $task->name }}" required="" name="name" />
                                </div>      
                            </form>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" form="form{{ $task->id }}" class="btn btn-primary">Save Changes</button>
                            </div>
                        </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">No task found</p>
                @endforelse
                
                
            </ul>
        </div>

        <div class="col-md-6">
            <h3 class="mb-4">Add new task</h3>
            <form action="{{ route('tasks.store') }}" method="post">
                @csrf
                <input type="hidden" name="project_id" value="{{ $project->id }}">
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

@push('scripts')

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    jQuery(document).ready(function () {
        let taskList = document.getElementById('taskList');
        
        // Create a new Sortable instance for the taskList
        new Sortable(taskList, {
            handle: 'li', // Only allow drag on li elements
            onUpdate: function (event) {
                let taskIds = Array.from(taskList.children).map(task => task.dataset.taskId);
                let url = '{{route('tasks.reorder')}}';

                // Send the updated task order to the server using AJAX
                $.ajax({
                    type: "POST",
                    url: url,
                    data: { taskIds },
                    success: function() { location.reload() },
                });
    
            },
        });
    });
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
@endpush