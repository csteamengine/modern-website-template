<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Link;
use App\Models\LinkVisit;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {

        $links = Link::where('start_date', '<=', date('Y-m-d H:i'))
            ->where('end_date', '>=', date('Y-m-d H:i'))
            ->orWhereNull('start_date')
            ->orWhereNull('end_date')
            ->orderBy('order', 'asc')->get();
        //Shows all projects (or at least a range and searchable)
        return view('frontend.links.index')->withLinks($links);
    }

    /**
     * Display the specified resource.
     *
     * @param Link $link
     */
    public function show(Link $link)
    {
        $visit = LinkVisit::create([
            'link_id' => $link->id,
        ]);

        if ($visit) {
            return redirect($link->url);
        }

        return redirect()->back();
    }
}
