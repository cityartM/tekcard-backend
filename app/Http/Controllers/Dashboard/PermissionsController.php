<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Permission\CreatePermissionRequest;
use App\Http\Requests\Permission\UpdatePermissionRequest;
use App\Models\Permission;
use App\Repositories\Permission\PermissionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Repositories\Role\RoleRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class PermissionsController
 * @package App\Http\Controllers\Dashboard
 */
class PermissionsController extends Controller
{
    /**
     * @var RoleRepository
     */
    private $roles;
    /**
     * @var PermissionRepository
     */
    private $permissions;

    /**
     * PermissionsController constructor.
     * @param RoleRepository $roles
     * @param PermissionRepository $permissions
     */
    public function __construct(RoleRepository $roles, PermissionRepository $permissions)
    {
        $this->middleware('auth');
        //$this->middleware('permission:permissions.manage');
        $this->roles = $roles;
        $this->permissions = $permissions;
    }

    /**
     * Displays the page with all available permissions.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $roles = $this->roles->all();
        $permissions = $this->permissions->all();

        return view('dashboard.permission.index', compact('roles', 'permissions'));
    }

    /**
     * Displays the form for creating new permission.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $edit = false;

        return view('dashboard.permission.add-edit', compact('edit'));
    }

    /**
     * Store permission to database.
     *
     * @param CreatePermissionRequest $request
     * @return mixed
     */
    public function store(CreatePermissionRequest $request)
    {
        $this->permissions->create($request->all());

        return redirect()->route('permissions.index')
            ->withSuccess(trans('app.permission_created_successfully'));
    }

    /**
     * Displays the form for editing specific permission.
     *
     * @param Permission $permission
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Permission $permission)
    {
        $edit = true;

        return view('dashboard.permission.add-edit', compact('edit', 'permission'));
    }

    /**
     * Update specified permission.
     *
     * @param Permission $permission
     * @param UpdatePermissionRequest $request
     * @return mixed
     */
    public function update(Permission $permission, UpdatePermissionRequest $request)
    {
        $this->permissions->update($permission->id, $request->all());

        return redirect()->route('permissions.index')
            ->withSuccess(trans('app.permission_updated_successfully'));
    }

    /**
     * Destroy the permission if it is removable.
     *
     * @param Permission $permission
     * @return mixed
     * @throws \Exception
     */
    public function destroy(Permission $permission)
    {
        if (! $permission->removable) {
            throw new NotFoundHttpException;
        }

        $this->permissions->delete($permission->id);

        return redirect()->route('permissions.index')
            ->withSuccess(trans('app.permission_deleted_successfully'));
    }

    /**
     * Update permissions for each role.
     *
     * @param Request $request
     * @return mixed
     */
    public function saveRolePermissions(Request $request)
    {
        $roles = $request->get('roles');
        $allRoles = $this->roles->lists('id');
        foreach ($allRoles as $roleId) {
            //$permissions = array_get($roles, $roleId, []);
            $permissions = Arr::get($roles, $roleId, []);
            //dd($roleId);
            $this->roles->updatePermissions($roleId, $permissions);
        }


        return redirect()->route('permissions.index')
            ->withSuccess(trans('app.permissions_saved_successfully'));
    }
}
