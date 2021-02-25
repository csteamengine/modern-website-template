<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Services\PositionService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

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
        $positions = Position::all();

        return view('frontend.positions.index')->withPositions($positions);
    }

    /**
     * Display the specified resource.
     *
     * @param Position $position
     * @return View
     */
    public function show(Position $position)
    {
        //Shows all the info on a single position.
        return view('frontend.positions.show')->withPosition($position);
    }
}
