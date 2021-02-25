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

        $this->addFiles($request, $theme);

        return redirect()->route('admin.themes.edit', $theme)->withFlashSuccess("Successfully Created the Theme");
    }

    /**
     * Display the specified resource.
     *
     * @param Theme $theme
     * @return Response
     */
    public function show(Theme $theme)
    {
        dump($theme);
        exit;
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

        $this->addFiles($request, $theme);

        return redirect()->route('admin.themes.edit', $theme)->withFlashSuccess("Successfully Updated the Theme");
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

        return redirect()->back()->withFlashSuccess(__('The theme was successfully deleted.'));
    }

    public function reorder(Request $request)
    {
        $validatedJSON = $request->validate([
            'themes' => 'required|JSON',
        ]);

        $data = json_decode($validatedJSON['themes']);

        foreach ($data as $JSONtheme) {
            $theme = Theme::find($JSONtheme->theme_id);
            $theme->order = $JSONtheme->order;
            if (! $theme->save()) {
                return response()->json([
                    'message' => 'Failed to update the theme order!',
                ], 400);
            }
        }

        return response()->json([
            'message' => "Successfully updated the theme order!",
        ], 200);
    }

    public function reorderMedia(Request $request)
    {
        $validatedJSON = $request->validate([
            'media' => 'required|JSON',
        ]);

        $data = json_decode($validatedJSON['media']);

        Media::setNewOrder($data);

        return response()->json([
            'message' => "Successfully updated the theme order!",
        ], 200);
    }

    public function deleteMedia(Request $request, Media $media)
    {
        if ($media->delete()) {
            return response()->json([
                'message' => "Successfully deleted the image!",
            ], 200);
        }

        return response()->json([
            'message' => 'Failed to delete the image.',
        ], 400);
    }

    /**
     * @param Theme $theme
     * @return mixed
     */
    public function activate(Theme $theme)
    {
        if ($theme) {
            $theme->is_active = ! $theme->is_active;

            $updateSuccess = $theme->save();

            if ($updateSuccess) {
                return response()->json([
                    'message' => "Successfully toggled the theme status",
                ], 200);
            }
        }

        return response()->json([
            'message' => "Failed To toggle the theme status",
        ], 400);
    }

    /**
     * @param Request $request
     * @param Theme $theme
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function addFiles(Request $request, Theme $theme)
    {
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $image) {
                $theme->addMedia($image)->toMediaCollection('images');
            }
        }

        if ($request->hasFile('background_image')) {
            $backgroundImage = $theme->addMedia($request->file('background_image'))->toMediaCollection('about_images');
            $theme->background_image_id = $backgroundImage->id;
        }

        if ($request->hasFile('about_image')) {
            $aboutImage = $theme->addMedia($request->file('about_image'))->toMediaCollection('about_images');
            $theme->about_image_id = $aboutImage->id;
        }

        if ($request->hasFile('resume')) {
            $resume = $theme->addMedia($request->file('resume'))->toMediaCollection('resumes');
            $theme->resume_file_id = $resume->id;
        }

        return $theme->save();
    }
}
