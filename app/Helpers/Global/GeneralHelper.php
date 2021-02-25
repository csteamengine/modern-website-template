<?php

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

if (! function_exists('appName')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function appName()
    {
        return config('app.name', 'Laravel Boilerplate');
    }
}

if (! function_exists('carbon')) {
    /**
     * Create a new Carbon instance from a time.
     *
     * @param $time
     *
     * @return Carbon
     * @throws Exception
     */
    function carbon($time)
    {
        return new Carbon($time);
    }
}

if (! function_exists('homeRoute')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function homeRoute()
    {
        if (auth()->check()) {
            if (auth()->user()->isAdmin()) {
                return 'admin.dashboard';
            }

            if (auth()->user()->isUser()) {
                return 'frontend.user.dashboard';
            }
        }

        return 'frontend.index';
    }
}

if (! function_exists('reorderObjects')) {
    /**
     * @param Request $request
     * @param string $class
     * @return JsonResponse
     */
    function reorderObjects(Request $request, $class = Model::class)
    {
        $validatedJSON = $request->validate([
            'objects' => 'required|JSON',
        ]);

        $data = json_decode($validatedJSON['objects']);

        foreach ($data as $index => $id) {
            $link = $class::find($id);
            $link->order = $index;
            if (! $link->save()) {
                return response()->json([
                    'message' => 'Failed to update the link order!',
                ], 400);
            }
        }

        return response()->json([
            'message' => "Successfully updated the link order!",
        ], 200);
    }
}

if (! function_exists('activate')) {
    /**
     * @param Model $model
     * @return JsonResponse
     */
    function activate(Model $model)
    {

        if ($model) {
            $model->is_active = ! $model->is_active;

            $updateSuccess = $model->save();

            if ($updateSuccess) {
                return response()->json([
                    'message' => "Successfully toggled the record's status",
                ], 200);
            }
        }

        return response()->json([
            'message' => "Failed To toggle the record's status",
        ], 400);
    }
}

if (! function_exists('reorderMedia')) {
    /**
     * @param Request $request
     * @return JsonResponse
     */
    function reorderMedia(Request $request)
    {
        $validatedJSON = $request->validate([
            'media' => 'required|JSON',
        ]);

        $data = json_decode($validatedJSON['media']);

        Media::setNewOrder($data);

        return response()->json([
            'message' => __("Successfully updated the theme order!"),
        ], 200);
    }
}

if (! function_exists('deleteMedia')) {
    /**
     * @param Request $request
     * @param Media $media
     * @return JsonResponse
     * @throws Exception
     */
    function deleteMedia(Request $request, Media $media)
    {

        if ($media->delete()) {
            return response()->json([
                'message' => __("Successfully deleted the image!"),
            ], 200);
        }

        return response()->json([
            'message' => __('Failed to delete the image.'),
        ], 400);
    }
}
