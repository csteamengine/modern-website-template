<?php

namespace App\Services;

use App\Events\Theme\ThemeCreated;
use App\Events\Theme\ThemeDeleted;
use App\Events\Theme\ThemeUpdated;
use App\Exceptions\GeneralException;
use App\Models\Theme;
use Exception;
use Illuminate\Support\Facades\DB;
use Throwable;

/**
 * Class ThemeService.
 */
class ThemeService extends BaseService
{
    /**
     * ThemeService constructor.
     *
     * @param Theme $theme
     */
    public function __construct(Theme $theme)
    {
        $this->model = $theme;
    }

    /**
     * @param  array  $data
     *
     * @return Theme
     * @throws GeneralException
     * @throws Throwable
     */
    public function store(array $data = []): Theme
    {
        DB::beginTransaction();

        try {
            $theme = $this->model::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['first_name'],
                'email' => $data['email'],
                'title' => $data['title'],
                'description' => $data['description'],
                'page_content' => $data['page_content'],
                'is_active' => isset($data['is_active']),
            ]);
        } catch (Exception $e) {
            dump($e);
            exit;
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating the theme.'));
        }

        event(new ThemeCreated($theme));

        DB::commit();

        return $theme;
    }

    /**
     * @param  Theme  $theme
     * @param  array  $data
     *
     * @return Theme
     * @throws GeneralException
     * @throws Throwable
     */
    public function update(Theme $theme, array $data = []): Theme
    {
        DB::beginTransaction();

        try {
            $theme->update([
                'first_name' => $data['first_name'],
                'last_name' => $data['first_name'],
                'email' => $data['email'],
                'title' => $data['title'],
                'description' => $data['description'],
                'page_content' => $data['page_content'],
                'is_active' => isset($data['is_active']),
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating the Theme.'));
        }

        event(new ThemeUpdated($theme));

        DB::commit();

        return $theme;
    }

    /**
     * @param  Theme  $theme
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy(Theme $theme): bool
    {
        if ($this->deleteById($theme->id)) {
            event(new ThemeDeleted($theme));

            return true;
        }

        throw new GeneralException(__('There was a problem deleting the Theme.'));
    }
}
