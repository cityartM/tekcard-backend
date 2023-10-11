<?php

namespace App\Repositories\Permission;

use App\Models\Permission;
use Cache;

class EloquentPermission implements PermissionRepository
{
    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return Permission::all();
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return Permission::find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $data)
    {
        $permission = Permission::create($data);


        return $permission;
    }

    /**
     * {@inheritdoc}
     */
    public function update($id, array $data)
    {
        $permission = $this->find($id);

        $permission->update($data);

        Cache::flush();


        return $permission;
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $permission = $this->find($id);


        $status = $permission->delete();

        Cache::flush();

        return $status;
    }
}
