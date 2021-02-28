<?php

namespace App\Services;

use App\Events\Blog\BlogCreated;
use App\Events\Blog\BlogDeleted;
use App\Events\Blog\BlogUpdated;
use App\Exceptions\GeneralException;
use App\Models\Blog;
use Exception;
use Illuminate\Support\Facades\DB;
use Throwable;

/**
 * Class BlogService.
 */
class BlogService extends BaseService
{
    /**
     * BlogService constructor.
     *
     * @param Blog $blog
     */
    public function __construct(Blog $blog)
    {
        $this->model = $blog;
    }

    /**
     * @param  array  $data
     *
     * @return Blog
     * @throws GeneralException
     * @throws Throwable
     */
    public function store(array $data = []): Blog
    {
        DB::beginTransaction();

        try {
            $blog = $this->model::create([
                'title' => $data['title'],
                'author_id' => auth()->user()->id,
                'short_description' => $data['short_description'],
                'tags' => $data['tags'],
                'description' => $data['description'],
                'page_content' => $data['page_content'],
                'external_url' => $data['external_url'],
                'is_active' => isset($data['is_active']),
                'started_at' => $data['started_at'],
                'finished_at' => $data['finished_at'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating the blog.'));
        }

        event(new BlogCreated($blog));

        DB::commit();

        return $blog;
    }

    /**
     * @param  Blog  $blog
     * @param  array  $data
     *
     * @return Blog
     * @throws GeneralException
     * @throws Throwable
     */
    public function update(Blog $blog, array $data = []): Blog
    {
        DB::beginTransaction();

        try {
            $blog->update([
                'title' => $data['title'],
                'author_id' => auth()->user()->id,
                'short_description' => $data['short_description'],
                'tags' => $data['tags'],
                'description' => $data['description'],
                'page_content' => $data['page_content'],
                'external_url' => $data['external_url'],
                'is_active' => isset($data['is_active']),
                'started_at' => $data['started_at'],
                'finished_at' => $data['finished_at'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating the Blog.'));
        }

        event(new BlogUpdated($blog));

        DB::commit();

        return $blog;
    }

    /**
     * @param  Blog  $blog
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy(Blog $blog): bool
    {
        if ($this->deleteById($blog->id)) {
            event(new BlogDeleted($blog));

            return true;
        }

        throw new GeneralException(__('There was a problem deleting the Blog.'));
    }
}
