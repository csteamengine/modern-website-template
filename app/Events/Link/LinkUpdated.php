<?php

namespace App\Events\Link;

use Illuminate\Queue\SerializesModels;

/**
 * Class LinkUpdated.
 */
class LinkUpdated
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
