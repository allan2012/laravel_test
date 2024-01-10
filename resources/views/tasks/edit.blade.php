@extends('layouts.app')
@section('title', 'Edit Task')

@section('content')
    <div class="row">
        <form action="{{ route('tasks.update', [$task->id]) }}" method="post">
            {{ method_field('PUT') }}
            <div class="mb-3">
                <label for="task-name" class="form-label">Task Name</label>
                <input type="text" class="form-control" id="task-name" name="name" value="{{ $task->name }}" />
            </div>
            <div class="mb-3">
                <label for="project" class="form-label">Project</label>
                <select name="project_id" class="form-select">
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}" {{ ($task->project_id === $project->id) ? 'selected' : '' }}>
                            {{ $project->name }}
                        </option>
                    @endforeach
                </select>
                {!! csrf_field() !!}
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

