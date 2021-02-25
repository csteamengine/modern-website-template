<?php

namespace App\Events\Theme;

use App\Models\Theme;
use Illuminate\Queue\SerializesModels;

/**
 * Class ThemeUpdated.
 */
class ThemeUpdated
{
    use SerializesModels;

    /**
     * @var
     */
    public $theme;

    /**
     * @param $theme
     */
    public function __construct(Theme $theme)
    {
        $this->theme = $theme;
    }
}
