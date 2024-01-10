@extends('layouts.app')
@section('title', 'Create Task')

@section('content')
    <div class="row">
        <form action="{{ route('tasks.store') }}" method="post">
            <div class="mb-3">
                <label for="task-name" class="form-label">Task Name</label>
                <input type="text" class="form-control" id="task-name" name="name" />
            </div>
            <div class="mb-3">
                <span class="text-danger">{{ $errors->first('name') }}</span>
            </div>
            <div class="mb-3">
                <label for="project" class="form-label">Project</label>
                <select name="project_id" class="form-select">
                    <option value="">-- Select project --</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}"> {{ $project->name }} </option>
                    @endforeach
                </select>
                {!! csrf_field() !!}
            </div>
            <div class="mb-3">
                <span class="text-danger">{{ $errors->first('project_id') }}</span>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
