@extends('layouts.app')
@section('title', 'Tasks')

@section('content')
    <div class="row">
        <div class="col-10">
            @if(count($projects))
                <form class="row g-3" action="{{ route('home') }}">
                    <div class="col-auto">
                        <label for="project-id" class="visually-hidden">Password</label>
                        <select class="form-control" name="project_id" id="project-id">
                            <option value="">-- Select Project --</option>
                            @foreach($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">View Tasks</button>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <a href="{{ route('tasks.create') }}" class="btn btn-sm btn-success">Create Task</a>
                        </div>
                    </div>
                </form>
            @else
                <p>Oops! There seems to be no project</p>
                <p>
                    <a href="{{ route('projects.create') }}" class="btn btn-sm btn-success">Create Project</a>
                </p>
            @endif
        </div>
    </div>

    <div class="row">
        @if(count($tasks))
            @if (Session::has('tasks'))
                <span class="mt-5">
                    {!! Session::get('tasks') !!}
                </span>
            @endif
            <div class="row" style="margin-top: 40px;">
                <div class="col-6"><h6>Task Name</h6></div>
                <div class="col-2"><h6>Date Created</h6></div>
                <div class="col-2"><h6>Project</h6></div>
                <div class="col-2"></div>
            </div>
            <div id="task-container">
                @foreach($tasks as $task)
                    <div task-id="{{ $task->id }}" class="task-item">
                        <div class="row">
                            <div class="col-6">{{ $task->name }}</div>
                            <div class="col-2">{{ $task->created_at->diffForHumans() }}</div>
                            <div class="col-2">{{ $task->project->name }}</div>
                            <div class="col-2">
                                <form id="delete-form" method="POST" action="{{ route('tasks.delete', [$task->id]) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <div class="form-group">
                                        <a href="{{ route('tasks.edit', [$task->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
        @endif
    </div>
@endsection
