<?php

namespace App\Models\Traits;

use App\Models\LinkVisit;
use Carbon\Carbon;

/**
 * Class UserRelationship.
 */
trait LinkRelationship
{

    /**
     * @return mixed
     */
    public function image()
    {
        return $this->getMedia('images')->last();
    }

    /**
     * @return mixed
     */
    public function visits()
    {
        return $this->hasMany(LinkVisit::class, 'link_id', 'id')
            ->orderBy('created_at')
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('Y-m-d'); // grouping by years
            });
    }
}
