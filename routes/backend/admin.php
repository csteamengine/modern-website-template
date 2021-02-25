<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\LinkController;
use App\Http\Controllers\Backend\PositionController;
use App\Http\Controllers\Backend\ProjectController;
use App\Http\Controllers\Backend\ThemeController;
use App\Models\Project;
use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::resources([
    'projects' => ProjectController::class,
    'themes' => ThemeController::class,
    'links' => LinkController::class,
    'positions' => PositionController::class,
]);

/*
 * Backend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Projects', 'prefix' => 'projects', 'as' => 'projects.', 'middleware' => 'admin'], function () {
    Route::post('/reorder', [ProjectController::class, 'reorder'])->name('reorder');
    Route::patch('{project}/activate', [ProjectController::class, 'activate'])->name('activate');
    Route::patch('{project}/reorder', [ProjectController::class, 'reorderMedia'])->name('reorder-media');
    Route::delete('/delete-media/{media}', [ProjectController::class, 'deleteMedia'])->name('delete-media');
});

Route::group(['namespace' => 'Themes', 'prefix' => 'themes', 'as' => 'themes.', 'middleware' => 'admin'], function () {
    Route::post('/reorder', [ThemeController::class, 'reorder'])->name('reorder');
    Route::post('{theme}/activate', [ThemeController::class, 'activate'])->name('activate');
    Route::patch('{theme}/reorder', [ThemeController::class, 'reorderMedia'])->name('reorder-media');
    Route::delete('/delete-media/{media}', [ThemeController::class, 'deleteMedia'])->name('delete-media');
});

Route::group(['namespace' => 'Links', 'prefix' => 'links', 'as' => 'links.', 'middleware' => 'admin'], function () {
    Route::post('/reorder', [LinkController::class, 'reorder'])->name('reorder');
    Route::patch('{link}/activate', [LinkController::class, 'activate'])->name('activate');
});

Route::group(['namespace' => 'Positions', 'prefix' => 'positions', 'as' => 'positions.', 'middleware' => 'admin'], function () {
    Route::post('/reorder', [PositionController::class, 'reorder'])->name('reorder');
    Route::patch('{position}/activate', [PositionController::class, 'activate'])->name('activate');
    Route::patch('{position}/reorder', [PositionController::class, 'reorderMedia'])->name('reorder-media');
    Route::delete('/delete-media/{media}', [PositionController::class, 'deleteMedia'])->name('delete-media');
});
