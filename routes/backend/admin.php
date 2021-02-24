<?php

use App\Http\Controllers\Backend\DashboardController;
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
]);

/*
 * Backend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Projects', 'prefix' => 'projects', 'as' => 'projects.', 'middleware' => 'admin'], function () {
//    Route::post('{id}/addImages', [ProjectController::class, 'addImages'])->name('addImages');
//    Route::post('{id}/updateImages', [ProjectController::class, 'updateImages'])->name('updateImages');
//    Route::post('{id}/orderImages', [ProjectController::class, 'orderImages'])->name('orderImages');
//    Route::post('{id}/deleteImages', [ProjectController::class, 'deleteImages'])->name('deleteImages');
    Route::post('/reorder', [ProjectController::class, 'reorder'])->name('reorder');
    Route::patch('{project}/activate', [ProjectController::class, 'activate'])->name('activate');
    Route::patch('{project}/reorder', [ProjectController::class, 'reorderMedia'])->name('reorder-media');
    Route::delete('/delete-media/{media}', [ProjectController::class, 'deleteMedia'])->name('delete-media');

});
