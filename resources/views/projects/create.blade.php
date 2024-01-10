@extends('layouts.app')
@section('title', 'Create Project')

@section('content')
    <div class="row">
        <form action="{{ route('projects.store') }}" method="post">
            <div class="mb-3">
                <label for="project-name" class="form-label">Project Name</label>
                <input type="text" class="form-control" id="project-name" name="name" value="{{ old('name') }}" />
                {!! csrf_field() !!}
            </div>
            <div class="mb-3">
                <span class="text-danger">{{ $errors->first('name') }}</span>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
