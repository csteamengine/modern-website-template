<?php

namespace App\Http\Controllers\Backend;

use App\Models\LinkVisit;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;

/**
 * Class DashboardController.
 */
class DashboardController
{


    /**
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $query = LinkVisit::select('id', 'created_at')
            ->get()
            ->groupBy(function ($date) {
//                return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                //return Carbon::parse($date->created_at)->format('m'); // grouping by months
                return Carbon::parse($date->created_at)->format('Y-m-d'); // grouping by days
            });

        $linkVisits = [];
        foreach ($query as $key => $curr) {
            array_push($linkVisits, [$key, sizeof($curr)]);
        }

        return view('backend.dashboard')->withVisits(json_encode($linkVisits));
    }
}
