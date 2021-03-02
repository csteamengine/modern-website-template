<?php

namespace App\Http\Controllers\Backend;

use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Project\DeleteProjectRequest;
use App\Http\Requests\Backend\Project\StoreProjectRequest;
use App\Http\Requests\Backend\Project\UpdateProjectRequest;
use App\Models\Project;
use App\Services\ProjectService;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PHPColorExtractor\PHPColorExtractor;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Storage;
use Throwable;

class ProjectController extends Controller
{

    /**
     * @var ProjectService
     */
    protected $projectService;

    /**
     * RoleController constructor.
     *
     * @param ProjectService $projectService
     */
    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //List all the projects
        $projects = Project::orderBy('order', 'asc')->get();

        return view('backend.projects.index')->withProjects($projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.projects.create');
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
        $project = $this->projectService->store($request->validated());

        addFiles($request, $project, 'media', 'images');

        return redirect()
            ->route('admin.projects.edit', $project)
            ->withFlashSuccess(__("Successfully Created the Project"));
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @return Response
     */
    public function show(Project $project)
    {
        return redirect()->route('backend.dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Project $project
     * @return Response
     */
    public function edit(Project $project)
    {
        return view('backend.projects.edit')->withProject($project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProjectRequest $request
     * @param Project $project
     * @return Response
     * @throws GeneralException
     * @throws Throwable
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $this->projectService->update($project, $request->validated());

        addFiles($request, $project, 'media', 'images');

        return redirect()->route('admin.projects.edit', $project)
            ->withFlashSuccess(__("Successfully Updated the Project"));
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
        $this->projectService->destroy($project);

        return redirect()->back()
            ->withFlashSuccess(__('The project was successfully deleted.'));
    }

    public function reorder(Request $request)
    {
        return reorderObjects($request, Project::class);
    }

    public function reorderMedia(Request $request)
    {
        return reorderMedia($request);
    }

    public function deleteMedia(Request $request, Media $media)
    {
        return deleteMedia($request, $media);
    }

    /**
     * @param Project $project
     * @return mixed
     */
    public function activate(Project $project)
    {
        return activate($project);
    }
}
