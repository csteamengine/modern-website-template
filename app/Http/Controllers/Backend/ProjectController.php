<?php

namespace App\Http\Controllers\Backend;

use App\Domains\Auth\Http\Requests\Backend\Role\DeleteProjectRequest;
use App\Domains\Auth\Http\Requests\Backend\Role\StoreProjectRequest;
use App\Domains\Auth\Http\Requests\Backend\Role\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Services\ProjectService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectController extends Controller
{

    /**
     * @var ProjectService
     */
    protected $projectService;
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //List all the projects
        $projects = Project::where('is_active', true)->get();
        dump($projects);
        exit;

        return view('backend.projects')->withProjects($projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProjectRequest $request
     * @return Response
     */
    public function store(StoreProjectRequest $request)
    {
        //Create new project, store in database and associate all files with it.
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @return Response
     */
    public function show(Project $project)
    {
        dump($project);
        exit;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Project $project
     * @return Response
     */
    public function edit(Project $project)
    {
        dump($project);
        exit;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProjectRequest $request
     * @param Project $project
     * @return Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeleteProjectRequest $request
     * @param Project $project
     * @return Response
     */
    public function destroy(DeleteProjectRequest $request, Project $project)
    {
        //
    }
}
