<?php

namespace App\Events\Link;

use Illuminate\Queue\SerializesModels;

/**
 * Class LinkDeleted.
 */
class LinkDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $link;

    /**
     * @param $link
     */
    public function __construct($link)
    {
        $this->link = $link;
    }
}
