<?php

namespace App\Domains\Auth\Listeners;

use App\Domains\Auth\Events\Role\ProjectCreated;
use App\Domains\Auth\Events\Role\ProjectDeleted;
use App\Domains\Auth\Events\Role\ProjectUpdated;

/**
 * Class RoleEventListener.
 */
class RoleEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        activity('role')
            ->performedOn($event->role)
            ->withProperties([
                'role' => [
                    'type' => $event->role->type,
                    'name' => $event->role->name,
                ],
                'permissions' => $event->role->permissions->count() ? $event->role->permissions->pluck('description')->implode(', ') : 'None',
            ])
            ->log(':causer.name created role :subject.name with permissions: :properties.permissions');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        activity('role')
            ->performedOn($event->role)
            ->withProperties([
                'role' => [
                    'type' => $event->role->type,
                    'name' => $event->role->name,
                ],
                'permissions' => $event->role->permissions->count() ? $event->role->permissions->pluck('description')->implode(', ') : 'None',
            ])
            ->log(':causer.name updated role :subject.name with permissions: :properties.permissions');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        activity('role')
            ->performedOn($event->role)
            ->log(':causer.name deleted role :subject.name');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            ProjectCreated::class,
            'App\Domains\Auth\Listeners\RoleEventListener@onCreated'
        );

        $events->listen(
            ProjectUpdated::class,
            'App\Domains\Auth\Listeners\RoleEventListener@onUpdated'
        );

        $events->listen(
            ProjectDeleted::class,
            'App\Domains\Auth\Listeners\RoleEventListener@onDeleted'
        );
    }
}
