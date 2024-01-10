@extends('layouts.app')
@section('title', 'Edit Project')

@section('content')
    <div class="row">
        <form action="{{ route('projects.update', [$project->id]) }}" method="post">
            {{ method_field('PUT') }}
            <div class="mb-3">
                <label for="task-name" class="form-label">Project Name</label>
                <input type="text" class="form-control" id="task-name" name="name" value="{{ $project->name }}" />
                {!! csrf_field() !!}
            </div>
            <div class="mb-3">
                <span class="text-danger">{{ $errors->first('name') }}</span>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

