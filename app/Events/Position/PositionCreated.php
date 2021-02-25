<?php

namespace App\Events\Position;

use App\Models\Position;
use Illuminate\Queue\SerializesModels;

/**
 * Class RoleCreated.
 */
class PositionCreated
{
    use SerializesModels;

    /**
     * @var
     */
    public $position;

    /**
     * @param $role
     */
    public function __construct(Position $position)
    {
        $this->position = $position;
    }
}
