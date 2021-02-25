<?php

namespace App\Events\Theme;

use App\Models\Theme;
use Illuminate\Queue\SerializesModels;

/**
 * Class RoleCreated.
 */
class ThemeCreated
{
    use SerializesModels;

    /**
     * @var
     */
    public $theme;

    /**
     * @param $role
     */
    public function __construct(Theme $theme)
    {
        $this->theme = $theme;
    }
}
