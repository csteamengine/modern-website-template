<?php

use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\LinkController;
use App\Http\Controllers\Frontend\PositionController;
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
Route::get('blogs/', [BlogController::class, 'index'])->name('blogs');
Route::get('blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');
Route::get('blogs/related/{tag}', [BlogController::class, 'related'])->name('blogs.related');
Route::get('links', [LinkController::class, 'index'])->name('links');
Route::get('links/{link}', [LinkController::class, 'show'])->name('links.show');
Route::get('career', [PositionController::class, 'index'])->name('career');
Route::get('career/{position}', [PositionController::class, 'show'])->name('career.show');
Route::get('about', [HomeController::class, 'about'])->name('about');
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact', [ContactController::class, 'send'])->name('contact.send');

