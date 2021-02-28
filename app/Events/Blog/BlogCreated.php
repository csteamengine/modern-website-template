<?php

namespace App\Events\Blog;

use App\Models\Blog;
use Illuminate\Queue\SerializesModels;

/**
 * Class RoleCreated.
 */
class BlogCreated
{
    use SerializesModels;

    /**
     * @var
     */
    public $blog;

    /**
     * @param $role
     */
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }
}
