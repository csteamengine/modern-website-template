<?php

namespace App\Http\Controllers\Backend;

use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Theme\DeleteThemeRequest;
use App\Http\Requests\Backend\Theme\StoreThemeRequest;
use App\Http\Requests\Backend\Theme\UpdateThemeRequest;
use App\Models\Theme;
use App\Services\ThemeService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Storage;
use Throwable;

class ThemeController extends Controller
{

    /**
     * @var ThemeService
     */
    protected $themeService;

    /**
     * RoleController constructor.
     *
     * @param ThemeService $themeService
     */
    public function __construct(ThemeService $themeService)
    {
        $this->themeService = $themeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //List all the themes
        $themes = Theme::orderBy('order', 'asc')->get();

        return view('backend.themes.index')->withThemes($themes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.themes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreThemeRequest $request
     * @return Response
     */
    public function store(StoreThemeRequest $request)
    {
        //Create new theme, store in database and associate all files with it.
        $theme = $this->themeService->store($request->validated());

        $this->addAllFiles($request, $theme);

        return redirect()
            ->route('admin.themes.edit', $theme)
            ->withFlashSuccess(__("Successfully Created the Theme"));
    }

    /**
     * Display the specified resource.
     *
     * @param Theme $theme
     * @return Response
     */
    public function show(Theme $theme)
    {
        return redirect()->route('admin.themes.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Theme $theme
     * @return Response
     */
    public function edit(Theme $theme)
    {
        return view('backend.themes.edit')->withTheme($theme);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateThemeRequest $request
     * @param Theme $theme
     * @return Response
     * @throws GeneralException
     * @throws Throwable
     */
    public function update(UpdateThemeRequest $request, Theme $theme)
    {
        $this->themeService->update($theme, $request->validated());

        $this->addAllFiles($request, $theme);

        return redirect()
            ->route('admin.themes.edit', $theme)
            ->withFlashSuccess(__("Successfully Updated the Theme"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeleteThemeRequest $request
     * @param Theme $theme
     * @return Response
     */
    public function destroy(DeleteThemeRequest $request, Theme $theme)
    {
        $this->themeService->destroy($theme);

        return redirect()
            ->back()
            ->withFlashSuccess(__('The theme was successfully deleted.'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reorder(Request $request)
    {
        return reorderObjects($request, Theme::class);
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
     * @param Theme $theme
     * @throws Throwable
     *
     * Can only activate the theme that is clicked because we don't want to have the
     * situation where a theme is inactive. At worst, when to click the active theme, it just re-activates it.
     * @return mixed
     */
    public function activate(Theme $theme)
    {
        if ($theme) {
            $updateSuccess = $theme->activateTheme();

            if ($updateSuccess) {
                return redirect()
                    ->back()
                    ->withFlashSuccess(__('Successfully activated the theme.'));
            }
        }

        return redirect()
            ->back()
            ->withFlashWarning(__('Failed to activate the theme.'));
    }

    /**
     * @param Request $request
     * @param Theme $theme
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function addAllFiles(Request $request, Theme $theme)
    {
        addFiles($request, $theme, 'media', 'images');
        addFileToModel($request->file('background_image'), $theme, 'background_images');
        addFileToModel($request->file('about_image'), $theme, 'about_images');
        addFileToModel($request->file('resume'), $theme, 'resumes');
        addFileToModel($request->file('favicon'), $theme, 'favicons');
    }
}
