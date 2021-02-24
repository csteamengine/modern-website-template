<?php

namespace App\Http\Controllers\Backend;

use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Project\DeleteProjectRequest;
use App\Http\Requests\Backend\Project\StoreProjectRequest;
use App\Http\Requests\Backend\Project\UpdateProjectRequest;
use App\Models\Project;
use App\Services\ProjectService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

        $this->addFiles($request, $project);

        return redirect()->route('admin.projects.edit', $project)->withFlashSuccess("Successfully Created the Project");
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

        $this->addFiles($request, $project);

        return redirect()->route('admin.projects.edit', $project)->withFlashSuccess("Successfully Updated the Project");
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

        return redirect()->back()->withFlashSuccess(__('The project was successfully deleted.'));
    }

    public function reorder(Request $request)
    {
        $validatedJSON = $request->validate([
            'projects' => 'required|JSON',
        ]);

        $data = json_decode($validatedJSON['projects']);

        foreach ($data as $JSONproject) {
            $project = Project::find($JSONproject->project_id);
            $project->order = $JSONproject->order;
            if (! $project->save()) {
                return response()->json([
                    'message' => 'Failed to update the project order!',
                ], 400);
            }
        }

        return response()->json([
            'message' => "Successfully updated the project order!",
        ], 200);
    }

    public function reorderMedia(Request $request)
    {
        $validatedJSON = $request->validate([
            'media' => 'required|JSON',
        ]);

        $data = json_decode($validatedJSON['media']);

        Media::setNewOrder($data);

        return response()->json([
            'message' => "Successfully updated the project order!",
        ], 200);
    }

    public function deleteMedia(Request $request, Media $media)
    {
        if ($media->delete()) {
            return response()->json([
                'message' => "Successfully deleted the image!",
            ], 200);
        }

        return response()->json([
            'message' => 'Failed to delete the image.',
        ], 400);
    }

    /**
     * @param Project $project
     * @return mixed
     */
    public function activate(Project $project)
    {
        if ($project) {
            $project->is_active = ! $project->is_active;

            $updateSuccess = $project->save();

            if ($updateSuccess) {
                return response()->json([
                    'message' => "Successfully toggled the project status",
                ], 200);
            }
        }

        return response()->json([
            'message' => "Failed To toggle the project status",
        ], 400);
    }

    /**
     * @param Request $request
     * @param Project $project
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function addFiles(Request $request, Project $project)
    {
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $image) {
                $project->addMedia($image)->toMediaCollection('images');
            }
        }
    }
}
