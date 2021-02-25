<?php

namespace App\Events\Position;

use App\Models\Position;
use Illuminate\Queue\SerializesModels;

/**
 * Class PositionUpdated.
 */
class PositionUpdated
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
