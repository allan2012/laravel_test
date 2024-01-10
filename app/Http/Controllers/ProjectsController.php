<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:projects|max:255',
        ]);

        $project = new Project;
        $project->name = $request->name;
        $project->save();
        return redirect()->route('projects');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact( 'project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|unique:projects|max:255',
        ]);

        $project->name = $request->name;
        $project->save();
        return redirect()->route('projects');
    }

    public function destroy(Request $request, Project $project)
    {
        if ($project->delete()) {
            $request->session()->flash('tasks', "<div class='alert alert-success' role='alert'>Task deleted successfully</div>");
        } else {
            $request->session()->flash('tasks', "<div class='alert alert-danger' role='alert'>Error deleting task</div>");
        }

        return redirect()->route('projects');
    }
}
