<?php

namespace App\Http\Controllers\Backend;

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
        return view('backend.dashboard');
    }
}
