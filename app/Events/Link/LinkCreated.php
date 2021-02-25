<?php

namespace App\Events\Link;

use Illuminate\Queue\SerializesModels;

/**
 * Class ProjectCreated.
 */
class LinkCreated
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
