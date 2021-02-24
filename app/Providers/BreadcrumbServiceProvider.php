<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Project;
use Tabuna\Breadcrumbs\Breadcrumbs;
use Tabuna\Breadcrumbs\Trail;

class BreadcrumbServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        Breadcrumbs::for(
            'admin.dashboard',
            function (Trail $trail) {
                return $trail->push(__('Home'), route('admin.dashboard'));
            }
        );

        Breadcrumbs::for(
            'admin.projects.index',
            function (Trail $trail) {
                return $trail->parent('admin.dashboard')
                    ->push('Projects', route('admin.projects.index'));
            }
        );

        Breadcrumbs::for(
            'admin.projects.edit',
            function (Trail $trail, Project $project) {
                return $trail->parent('admin.projects.index')
                    ->push('Edit Project', route('admin.projects.edit', $project));
            }
        );

        Breadcrumbs::for(
            'admin.projects.create',
            function (Trail $trail) {
                return $trail->parent('admin.projects.index')
                    ->push('Create Project', route('admin.projects.create'));
            }
        );
    }
}
