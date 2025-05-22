<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return Project::with('client')->get();
    }

    public function store(Request $request)
    {
        return Project::create($request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'client_id' => 'required|exists:clients,id',
            'status' => 'in:active,completed',
            'deadline' => 'nullable|date'
        ]));
    }

    public function show(Project $project)
    {
        return $project;
    }

    public function update(Request $request, Project $project)
    {
        $project->update($request->only('title', 'description', 'status', 'deadline'));
        return $project;
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return response()->json(['message' => 'Project deleted']);
    }
}
