<?php
namespace App\Providers;

use App\Models\Link;
use App\Models\Theme;
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

        Breadcrumbs::for(
            'admin.themes.index',
            function (Trail $trail) {
                return $trail->parent('admin.dashboard')
                    ->push('Themes', route('admin.themes.index'));
            }
        );

        Breadcrumbs::for(
            'admin.themes.edit',
            function (Trail $trail, Theme $theme) {
                return $trail->parent('admin.themes.index')
                    ->push('Edit Theme', route('admin.themes.edit', $theme));
            }
        );

        Breadcrumbs::for(
            'admin.themes.create',
            function (Trail $trail) {
                return $trail->parent('admin.themes.index')
                    ->push('Create Theme', route('admin.themes.create'));
            }
        );

        Breadcrumbs::for(
            'admin.links.index',
            function (Trail $trail) {
                return $trail->parent('admin.dashboard')
                    ->push('Links', route('admin.links.index'));
            }
        );

        Breadcrumbs::for(
            'admin.links.edit',
            function (Trail $trail, Link $link) {
                return $trail->parent('admin.links.index')
                    ->push('Edit Link', route('admin.links.edit', $link));
            }
        );

        Breadcrumbs::for(
            'admin.links.create',
            function (Trail $trail) {
                return $trail->parent('admin.links.index')
                    ->push('Create Link', route('admin.links.create'));
            }
        );
    }
}
