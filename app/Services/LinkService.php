<?php

namespace App\Services;

use App\Events\Link\LinkCreated;
use App\Events\Link\LinkDeleted;
use App\Events\Link\LinkUpdated;
use App\Exceptions\GeneralException;
use App\Models\Link;
use Exception;
use Illuminate\Support\Facades\DB;
use Throwable;

/**
 * Class LinkRepository.
 */
class LinkService extends BaseService
{

    /**
     * LinkService constructor.
     *
     * @param Link $link
     */
    public function __construct(Link $link)
    {
        $this->model = $link;
    }

    /**
     * @param  array  $data
     *
     * @return Link
     * @throws GeneralException
     * @throws Throwable
     */
    public function store(array $data = []): Link
    {
        DB::beginTransaction();

        try {
            $link = $this->model::create([
                'title' => $data['title'],
                'url' => $data['url'],
                'priority' => 0,
                'description' => $data['description'],
                'start_date' => $data['start_date'] ? date('Y-m-d H:i:s', strtotime($data['start_date'])) : null,
                'end_date' => $data['end_date'] ? date('Y-m-d H:i:s', strtotime($data['end_date'])) : null,
                'is_active' => isset($data['is_active']) && $data['is_active'] === '1',
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating the link.'));
        }

        event(new LinkCreated($link));

        DB::commit();

        return $link;
    }

    /**
     * @param  Link  $link
     * @param  array  $data
     *
     * @return Link
     * @throws GeneralException
     * @throws Throwable
     */
    public function update(Link $link, array $data = []): Link
    {
        DB::beginTransaction();

        try {
            $link->update([
                'title' => $data['title'],
                'url' => $data['url'],
                'description' => $data['description'],
                'start_date' => $data['start_date'] ? date('Y-m-d H:i:s', strtotime($data['start_date'])) : null,
                'end_date' => $data['end_date'] ? date('Y-m-d H:i:s', strtotime($data['end_date'])) : null,
                'is_active' => isset($data['is_active']) && $data['is_active'] === '1',
            ]);
        } catch (Exception $e) {
            dump($e);
            exit;
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating the Link.'));
        }

        event(new LinkUpdated($link));

        DB::commit();

        return $link;
    }

    /**
     * @param  Link  $link
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy(Link $link): bool
    {
        if ($this->deleteById($link->id)) {
            event(new LinkDeleted($link));

            return true;
        }

        throw new GeneralException(__('There was a problem deleting the Link.'));
    }
}
