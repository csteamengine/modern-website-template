<?php

namespace App\Events\Position;

use App\Models\Position;
use Illuminate\Queue\SerializesModels;

/**
 * Class PositionDeleted.
 */
class PositionDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $position;

    /**
     * @param $position
     */
    public function __construct(Position $position)
    {
        $this->position = $position;
    }
}
