<?php

namespace App\Http\Controllers\Backend;

use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Blog\DeleteBlogRequest;
use App\Http\Requests\Backend\Blog\StoreBlogRequest;
use App\Http\Requests\Backend\Blog\UpdateBlogRequest;
use App\Models\Blog;
use App\Services\BlogService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PHPColorExtractor\PHPColorExtractor;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Storage;
use Throwable;

class BlogController extends Controller
{

    /**
     * @var BlogService
     */
    protected $blogService;

    /**
     * RoleController constructor.
     *
     * @param BlogService $blogService
     */
    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //List all the blogs
        $blogs = Blog::orderBy('order', 'asc')->get();

        return view('backend.blogs.index')->withBlogs($blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBlogRequest $request
     * @return Response
     */
    public function store(StoreBlogRequest $request)
    {
        //Create new blog, store in database and associate all files with it.
        $blog = $this->blogService->store($request->validated());

        $this->addFiles($request, $blog);

        return redirect()
            ->route('admin.blogs.edit', $blog)
            ->withFlashSuccess(__("Successfully Created the Blog"));
    }

    /**
     * Display the specified resource.
     *
     * @param Blog $blog
     * @return Response
     */
    public function show(Blog $blog)
    {
        return redirect()->route('backend.dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Blog $blog
     * @return Response
     */
    public function edit(Blog $blog)
    {
        return view('backend.blogs.edit')->withBlog($blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateBlogRequest $request
     * @param Blog $blog
     * @return Response
     * @throws GeneralException
     * @throws Throwable
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $this->blogService->update($blog, $request->validated());

        $this->addFiles($request, $blog);

        return redirect()->route('admin.blogs.edit', $blog)
            ->withFlashSuccess(__("Successfully Updated the Blog"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeleteBlogRequest $request
     * @param Blog $blog
     * @return Response
     */
    public function destroy(DeleteBlogRequest $request, Blog $blog)
    {
        $this->blogService->destroy($blog);

        return redirect()->back()
            ->withFlashSuccess(__('The blog was successfully deleted.'));
    }

    public function reorder(Request $request)
    {
        return reorderObjects($request, Blog::class);
    }

    public function reorderMedia(Request $request)
    {
        return reorderMedia($request);
    }

    public function deleteMedia(Request $request, Media $media)
    {
        return deleteMedia($request, $media);
    }

    /**
     * @param Blog $blog
     * @return mixed
     */
    public function activate(Blog $blog)
    {
        return activate($blog);
    }

    /**
     * @param Request $request
     * @param Blog $blog
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function addFiles(Request $request, Blog $blog)
    {
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $image) {
                if ($image->getMimeType() == "application/pdf") {
                    $blog->addMedia($image)
                        ->withCustomProperties(['color' => '808080'])
                        ->toMediaCollection('images');
                } else {
                    $extractor = new PHPColorExtractor();
                    $extractor->setImage($image)->setTotalColors(5)->setGranularity(10);
                    $palette = $extractor->extractPalette();

                    $blog->addMedia($image)
                        ->withCustomProperties(['color' => $palette[sizeof($palette) - 1]])
                        ->toMediaCollection('images');
                }
            }
        }
    }
}
