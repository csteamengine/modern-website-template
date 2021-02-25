<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Link\ManageLinkRequest;
use App\Http\Requests\Backend\Link\StoreLinkRequest;
use App\Http\Requests\Backend\Link\UpdateLinkRequest;
use App\Models\Link;
use App\Services\LinkService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
//use PHPColorExtractor\PHPColorExtractor;
use Illuminate\View\View;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Throwable;

class LinkController extends Controller
{
    /**
     * @var LinkService
     */
    protected $linkService;

    /**
     * LinkController constructor.
     *
     * @param LinkService $linkService
     */
    public function __construct(LinkService $linkService)
    {
        $this->linkService = $linkService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        //List all the links
        $links = Link::orderBy('order', 'asc')->get();

        return view('backend.links.index')->withLinks($links);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        return view('backend.links.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreLinkRequest $request
     * @return Response
     */
    public function store(StoreLinkRequest $request)
    {
        //Create new link, store in database and associate all files with it.
        $link = $this->linkService->store($request->validated());

        $this->addFiles($request, $link);

        return redirect()->route('admin.links.edit', $link)->withFlashSuccess("Successfully Created the Link");
    }

    /**
     * Display the specified resource.
     *
     * @param ManageLinkRequest $request
     * @param Link $link
     * @return View
     */
    public function show(ManageLinkRequest $request, Link $link): View
    {
        return view('backend.links.show')
            ->withLink($link)
            ->withVisits($link->visits());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ManageLinkRequest $request
     * @param Link $link
     * @return View
     */
    public function edit(ManageLinkRequest $request, Link $link): View
    {
        $image = $link->image();

        return view('backend.links.edit')
            ->withLink($link)
            ->withImage($image);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLinkRequest $request
     * @param Link $link
     * @throws Throwable
     * @return Redirector|RedirectResponse
     */
    public function update(UpdateLinkRequest $request, Link $link)
    {
        $this->linkService->update($link, $request->validated());

        $this->addFiles($request, $link);

        return redirect()->route('admin.links.edit', $link)->withFlashSuccess("Successfully Updated the Link");
    }

    /**
     * @param Request $request
     * @param Link $link
     * @throws FileDoesNotExist
     * @throws FileIsTooBig|FileIsTooBig
     */
    public function addFiles(Request $request, Link $link)
    {
        if ($request->hasFile('image')) {
            $link->addMedia($request->file('image'))->toMediaCollection('images');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ManageLinkRequest $request
     * @param Link $link
     * @throws Exception
     * @return Redirector|RedirectResponse
     */
    public function destroy(ManageLinkRequest $request, Link $link)
    {
        $this->linkService->destroy($link);

        return redirect()->back()->withFlashSuccess(__('The link was successfully deleted.'));
    }

    /**
     * @param Link $link
     * @return mixed
     */
    public function activate(Link $link)
    {
        if ($link) {
            $link->is_active = ! $link->is_active;

            $updateSuccess = $link->save();

            if ($updateSuccess) {
                return response()->json([
                    'message' => "Successfully toggled the link status",
                ], 200);
            }
        }

        return response()->json([
            'message' => "Failed To toggle the link status",
        ], 400);
    }

    public function reorder(Request $request)
    {
        $validatedJSON = $request->validate([
            'links' => 'required|JSON',
        ]);

        $data = json_decode($validatedJSON['links']);

        foreach ($data as $JSONlink) {
            $link = Link::find($JSONlink->link_id);
            $link->order = $JSONlink->order;
            if (! $link->save()) {
                return response()->json([
                    'message' => 'Failed to update the link order!',
                ], 400);
            }
        }

        return response()->json([
            'message' => "Successfully updated the link order!",
        ], 200);
    }
}
