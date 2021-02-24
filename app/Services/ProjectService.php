<?php

namespace App\Services;

use App\Events\Project\ProjectCreated;
use App\Events\Project\ProjectDeleted;
use App\Events\Project\ProjectUpdated;
use App\Exceptions\GeneralException;
use App\Models\Project;
use Exception;
use Illuminate\Support\Facades\DB;
use Throwable;

/**
 * Class RoleService.
 */
class ProjectService extends BaseService
{
    /**
     * RoleService constructor.
     *
     * @param Project $role
     */
    public function __construct(Project $role)
    {
        $this->model = $role;
    }

    /**
     * @param  array  $data
     *
     * @return Project
     * @throws GeneralException
     * @throws Throwable
     */
    public function store(array $data = []): Project
    {
        DB::beginTransaction();

        try {
            $project = $this->model::create([
                'title' => $data['title'],
                'short_description' => $data['short_description'],
                'description' => $data['description'],
                'page_content' => $data['page_content'],
                'external_url' => $data['external_url'],
                'is_active' => isset($data['is_active']),
                'started_at' => $data['started_at'],
                'finished_at' => $data['finished_at'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            dump($e);
            exit;
            throw new GeneralException(__('There was a problem creating the project.'));
        }

        event(new ProjectCreated($project));

        DB::commit();

        return $project;
    }

    /**
     * @param  Project  $project
     * @param  array  $data
     *
     * @return Project
     * @throws GeneralException
     * @throws Throwable
     */
    public function update(Project $project, array $data = []): Project
    {
        DB::beginTransaction();

        try {
            $project->update([
                'title' => $data['title'],
                'short_description' => $data['short_description'],
                'description' => $data['description'],
                'page_content' => $data['page_content'],
                'external_url' => $data['external_url'],
                'is_active' => isset($data['is_active']),
                'started_at' => $data['started_at'],
                'finished_at' => $data['finished_at'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating the Project.'));
        }

        event(new ProjectUpdated($project));

        DB::commit();

        return $project;
    }

    /**
     * @param  Project  $project
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy(Project $project): bool
    {
        if ($this->deleteById($project->id)) {
            event(new ProjectDeleted($project));

            return true;
        }

        throw new GeneralException(__('There was a problem deleting the Project.'));
    }
}
