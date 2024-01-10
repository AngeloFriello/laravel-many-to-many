<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Models\Type;
use App\Models\Technology;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$data = $request->all();
        //$query = Project::limit(20);
        
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $technologies = Technology::orderBy('name', 'ASC')->get();
        $types = Type::orderBy('name', 'ASC')->get();
        
        return view('projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
       
        $data = $request->validated();
        $project = Project::create($data);
        // $project = Project::create($data);
        // $newProject = new Project();
        // $newProject->name = $data['name'];
        // $newProject->bio = $data['bio'];
        // $newProject->type = $data['type'];
        // $newProject->admin = $data['admin'];
        // $newProject->thumb = $data['thumb'];
        // $newProject->save();

        if ($request->has('technologies')) {
            $project->technologies()->sync($data['technologies']);
        } else {

            $project->technologies()->detach();
        }
        return redirect()->route('projects.show', $project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::orderBy('name', 'ASC')->get();
        $technologies = Technology::orderBy('name', 'ASC')->get();
        
        return view('projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();

        $project->update($data);

       if ($request->has('technologies')) {
            $project->technologies()->sync($data['technologies']);
        } else {

            $project->technologies()->detach();
        }
        
        return redirect()->route('projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->technologies()->sync([]);
        $project->delete();

        return redirect()->route('projects.index');
    }
}
