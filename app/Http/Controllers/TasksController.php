<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    public function index(Request $request)
    {
        $projects = Project::all();
        $projectId = $request->get('project_id');

        $tasks = isset($projectId)
            ? Task::where('project_id', $request->get('project_id'))->orderBy('priority','asc')->get()
            : [];

        return view('tasks.index', compact('projects', 'tasks'));
    }

    public function create()
    {
        $projects = Project::all();
        return view('tasks.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:projects|max:255',
            'project_id' => 'required',
        ]);

        $task = new Task;
        $task->name = $request->name;
        $task->project_id = $request->project_id;
        $task->priority = Task::MAX_PRIORITY_VAL;
        $task->save();
        return redirect()->route('home', ['project_id'=> $request->project_id]);
    }

    public function edit(Task $task)
    {
        $projects = Project::all();
        return view('tasks.edit', compact('task', 'projects'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required|unique:projects|max:255',
            'project_id' => 'required',
        ]);

        $task->name = $request->name;
        $task->project_id = $request->project_id;
        $task->save();
        return redirect()->route('home', ['project_id'=> $request->project_id]);
    }

    public function destroy(Request $request, Task $task)
    {
        if ($task->delete()) {
            $request->session()->flash('tasks', "<div class='alert alert-success' role='alert'>Task deleted successfully</div>");
        } else {
            $request->session()->flash('tasks', "<div class='alert alert-danger' role='alert'>Error deleting task</div>");
        }

        return redirect()->route('home', ['project_id' => $task->project->id]);
    }

    public function updatePriority(Request $request)
    {
        $taskCount = count($request->data);

        for($i=0; $i < $taskCount; $i++) {
            DB::table('tasks')
                ->where('id', (int)$request->data[$i])
                ->update(['priority' => $i]);
        }

        return response('', 204);
    }

}
