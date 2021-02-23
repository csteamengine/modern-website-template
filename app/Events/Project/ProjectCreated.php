<?php

namespace App\Events\Project;

use App\Models\Project;
use Illuminate\Queue\SerializesModels;

/**
 * Class RoleCreated.
 */
class ProjectCreated
{
    use SerializesModels;

    /**
     * @var
     */
    public $project;

    /**
     * @param $role
     */
    public function __construct(Project $project)
    {
        $this->project = $project;
    }
}
