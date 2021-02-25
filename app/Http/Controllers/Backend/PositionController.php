<?php

namespace App\Http\Controllers\Backend;

use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Position\DeletePositionRequest;
use App\Http\Requests\Backend\Position\StorePositionRequest;
use App\Http\Requests\Backend\Position\UpdatePositionRequest;
use App\Models\Position;
use App\Services\PositionService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PHPColorExtractor\PHPColorExtractor;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Storage;
use Throwable;

class PositionController extends Controller
{

    /**
     * @var PositionService
     */
    protected $positionService;

    /**
     * RoleController constructor.
     *
     * @param PositionService $positionService
     */
    public function __construct(PositionService $positionService)
    {
        $this->positionService = $positionService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //List all the positions
        $positions = Position::orderBy('order', 'asc')->get();

        return view('backend.positions.index')->withPositions($positions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.positions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePositionRequest $request
     * @return Response
     */
    public function store(StorePositionRequest $request)
    {
        //Create new position, store in database and associate all files with it.
        $position = $this->positionService->store($request->validated());

        $this->addFiles($request, $position);

        return redirect()
            ->route('admin.positions.edit', $position)
            ->withFlashSuccess(__("Successfully Created the Position"));
    }

    /**
     * Display the specified resource.
     *
     * @param Position $position
     * @return Response
     */
    public function show(Position $position)
    {
        dump($position);
        exit;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Position $position
     * @return Response
     */
    public function edit(Position $position)
    {
        return view('backend.positions.edit')->withPosition($position);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePositionRequest $request
     * @param Position $position
     * @return Response
     * @throws GeneralException
     * @throws Throwable
     */
    public function update(UpdatePositionRequest $request, Position $position)
    {
        $this->positionService->update($position, $request->validated());

        $this->addFiles($request, $position);

        return redirect()
            ->route('admin.positions.edit', $position)
            ->withFlashSuccess(__("Successfully Updated the Position"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeletePositionRequest $request
     * @param Position $position
     * @return Response
     */
    public function destroy(DeletePositionRequest $request, Position $position)
    {
        $this->positionService->destroy($position);

        return redirect()
            ->back()
            ->withFlashSuccess(__('The position was successfully deleted.'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reorder(Request $request)
    {
        return reorderObjects($request, Position::class);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reorderMedia(Request $request)
    {
        return reorderMedia($request);
    }

    public function deleteMedia(Request $request, Media $media)
    {
        return deleteMedia($request, $media);
    }

    /**
     * @param Position $position
     * @throws Throwable
     *
     * Can only activate the position that is clicked because we don't want to have the
     * situation where a position is inactive. At worst, when to click the active position, it just re-activates it.
     * @return mixed
     */
    public function activate(Position $position)
    {
        return activate($position);
    }

    /**
     * @param Request $request
     * @param Position $position
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function addFiles(Request $request, Position $position)
    {
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $image) {
                $extractor = new PHPColorExtractor();
                $extractor->setImage($image)->setTotalColors(5)->setGranularity(10);
                $palette = $extractor->extractPalette();

                $position->addMedia($image)
                    ->withCustomProperties(['color' => $palette[sizeof($palette) - 1]])
                    ->toMediaCollection('images');
            }
        }
    }
}
