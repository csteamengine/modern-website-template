<?php

namespace App\Events\Blog;

use App\Models\Blog;
use Illuminate\Queue\SerializesModels;

/**
 * Class BlogDeleted.
 */
class BlogDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $blog;

    /**
     * @param $blog
     */
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }
}
