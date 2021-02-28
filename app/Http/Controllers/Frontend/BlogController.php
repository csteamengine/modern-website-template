<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Services\BlogService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

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
        $blogs = Blog::all();

        return view('frontend.blogs.index')->withBlogs($blogs);
    }

    /**
     * Display the specified resource.
     *
     * @param Blog $blog
     * @return View
     */
    public function show(Blog $blog)
    {
        //Shows all the info on a single blog.
        return view('frontend.blogs.show')->withBlog($blog);
    }

    /**
     * Display the specified resource.
     *
     * @param $tag
     * @return View
     */
    public function related($tag)
    {
        $blogs = Blog::where('tags', 'LIKE', '%'.$tag.'%')->get();

        //Shows all the info on a single blog.
        return view('frontend.blogs.related')->withBlogs($blogs)->withTag($tag);
    }


}
