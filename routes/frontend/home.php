<?php

use App\Http\Controllers\Frontend\LinkController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProjectController;
use App\Http\Controllers\Frontend\TermsController;
use Tabuna\Breadcrumbs\Trail;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])
    ->name('index')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('frontend.index'));
    });

Route::get('terms', [TermsController::class, 'index'])
    ->name('pages.terms')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('frontend.index')
            ->push(__('Terms & Conditions'), route('frontend.pages.terms'));
    });

Route::get('projects/', [ProjectController::class, 'index'])->name('projects');
Route::get('projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('links', [LinkController::class, 'index'])->name('links');
Route::get('links/{link}', [LinkController::class, 'show'])->name('links.show');
Route::get('positions', [LinkController::class, 'index'])->name('positions');
Route::get('positions/{position}', [LinkController::class, 'show'])->name('positions.show');
