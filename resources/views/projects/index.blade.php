@extends('layouts.app')
@section('title', 'Projects')

@section('content')
    <div class="row">
        <div class="col-10"></div>
        <div class="col-2">
            <a href="{{ route('projects.create') }}" class="btn btn-sm btn-success">Create Project</a>
        </div>
    </div>
    <div class="row">
        <div style="margin-top: 40px;">
            @if (Session::has('projects'))
                {!! Session::get('projects') !!}
            @endif
            <div class="row">
                <div class="col-10"><h6>Project Name</h6></div>
                <div class="col-2"></div>
            </div>
            @foreach($projects as $project)
                <div class="task-item">
                    <div class="row">
                        <div class="col-10">{{ $project->name }}</div>
                        <div class="col-2">
                            <form id="delete-form" method="POST" action="{{ route('projects.delete', [$project->id]) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <div class="form-group">
                                    <a href="{{ route('projects.edit', [$project->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
