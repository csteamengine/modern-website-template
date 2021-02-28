<?php

namespace App\Events\Blog;

use App\Models\Blog;
use Illuminate\Queue\SerializesModels;

/**
 * Class BlogUpdated.
 */
class BlogUpdated
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
