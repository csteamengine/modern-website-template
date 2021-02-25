<?php

namespace App\Services;

use App\Events\Position\PositionCreated;
use App\Events\Position\PositionDeleted;
use App\Events\Position\PositionUpdated;
use App\Exceptions\GeneralException;
use App\Models\Position;
use Exception;
use Illuminate\Support\Facades\DB;
use Throwable;

/**
 * Class PositionService.
 */
class PositionService extends BaseService
{
    /**
     * PositionService constructor.
     *
     * @param Position $position
     */
    public function __construct(Position $position)
    {
        $this->model = $position;
    }

    /**
     * @param  array  $data
     *
     * @return Position
     * @throws GeneralException
     * @throws Throwable
     */
    public function store(array $data = []): Position
    {
        DB::beginTransaction();

        try {
            $position = $this->model::create([
                'title' => $data['title'],
                'company' => $data['company'],
                'description' => $data['description'],
                'short_description' => $data['short_description'],
                'page_content' => $data['page_content'],
                'is_active' => isset($data['is_active']),
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
            ]);
        } catch (Exception $e) {

            DB::rollBack();

            throw new GeneralException(__('There was a problem creating the position.'));
        }

        event(new PositionCreated($position));

        DB::commit();

        return $position;
    }

    /**
     * @param  Position  $position
     * @param  array  $data
     *
     * @return Position
     * @throws GeneralException
     * @throws Throwable
     */
    public function update(Position $position, array $data = []): Position
    {
        DB::beginTransaction();

        try {
            $position->update([
                'title' => $data['title'],
                'company' => $data['company'],
                'description' => $data['description'],
                'short_description' => $data['short_description'],
                'page_content' => $data['page_content'],
                'is_active' => isset($data['is_active']),
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating the Position.'));
        }

        event(new PositionUpdated($position));

        DB::commit();

        return $position;
    }

    /**
     * @param  Position  $position
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy(Position $position): bool
    {
        if ($this->deleteById($position->id)) {
            event(new PositionDeleted($position));

            return true;
        }

        throw new GeneralException(__('There was a problem deleting the Position.'));
    }
}
