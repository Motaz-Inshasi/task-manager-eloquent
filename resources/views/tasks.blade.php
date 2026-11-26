@extends('layout.app')

@section('content')
    <h1 class="mt-4">Task List App</h1>

    <div class="row">
        <div class="col-md-8 offset-md-2">

            @if (isset($task))
                <div class="card mb-4">
                    <div class="card-header">Update Task</div>
                    <div class="card-body">
                        <form action="{{ url('update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $task->id }}">
                            <div class="mb-3">
                                <label for="task-name" class="form-label">Task</label>
                                <input type="text" name="name" id="task-name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $task->name) }}">
                                @error('name')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-plus me-1"></i> Update Task
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <div class="card mb-4">
                    <div class="card-header">New Task</div>
                    <div class="card-body">
                        <form action="{{ url('create') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="task-name" class="form-label">Task</label>
                                <input type="text" name="name" id="task-name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                @error('name')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-plus me-1"></i> Add Task
                            </button>
                        </form>
                    </div>
                </div>
            @endif

            <div class="card mb-4">
                <div class="card-header">Current Tasks</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Task</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $task->name }}</td>
                                <td>
                                    <form action="{{ url('delete/' . $task->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash me-1"></i> Delete
                                        </button>
                                    </form>
                                    <form action="{{ url('edit/' . $task->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-info">
                                            <i class="fa fa-info me-1"></i> Edit
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
