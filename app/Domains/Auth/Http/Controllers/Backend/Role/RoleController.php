<?php

namespace App\Domains\Auth\Http\Controllers\Backend\Role;

use App\Domains\Auth\Http\Requests\Backend\Role\DeleteThemeRequest;
use App\Domains\Auth\Http\Requests\Backend\Role\EditThemeRequest;
use App\Domains\Auth\Http\Requests\Backend\Role\StoreThemeRequest;
use App\Domains\Auth\Http\Requests\Backend\Role\UpdateThemeRequest;
use App\Domains\Auth\Models\Role;
use App\Domains\Auth\Services\PermissionService;
use App\Domains\Auth\Services\RoleService;

/**
 * Class RoleController.
 */
class RoleController
{
    /**
     * @var RoleService
     */
    protected $roleService;

    /**
     * @var PermissionService
     */
    protected $permissionService;

    /**
     * RoleController constructor.
     *
     * @param  RoleService  $roleService
     * @param  PermissionService  $permissionService
     */
    public function __construct(RoleService $roleService, PermissionService $permissionService)
    {
        $this->roleService = $roleService;
        $this->permissionService = $permissionService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.auth.role.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.auth.role.create')
            ->withCategories($this->permissionService->getCategorizedPermissions())
            ->withGeneral($this->permissionService->getUncategorizedPermissions());
    }

    /**
     * @param  StoreThemeRequest  $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreThemeRequest $request)
    {
        $this->roleService->store($request->validated());

        return redirect()->route('admin.auth.role.index')->withFlashSuccess(__('The role was successfully created.'));
    }

    /**
     * @param  EditThemeRequest  $request
     * @param  Role  $role
     *
     * @return mixed
     */
    public function edit(EditThemeRequest $request, Role $role)
    {
        return view('backend.auth.role.edit')
            ->withCategories($this->permissionService->getCategorizedPermissions())
            ->withGeneral($this->permissionService->getUncategorizedPermissions())
            ->withRole($role)
            ->withUsedPermissions($role->permissions->modelKeys());
    }

    /**
     * @param  UpdateThemeRequest  $request
     * @param  Role  $role
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(UpdateThemeRequest $request, Role $role)
    {
        $this->roleService->update($role, $request->validated());

        return redirect()->route('admin.auth.role.index')->withFlashSuccess(__('The role was successfully updated.'));
    }

    /**
     * @param  DeleteThemeRequest  $request
     * @param  Role  $role
     *
     * @return mixed
     * @throws \Exception
     */
    public function destroy(DeleteThemeRequest $request, Role $role)
    {
        $this->roleService->destroy($role);

        return redirect()->route('admin.auth.role.index')->withFlashSuccess(__('The role was successfully deleted.'));
    }
}
