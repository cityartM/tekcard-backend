<?php

namespace App\Support\Plugins;

use Vanguard\Plugins\Plugin;
use App\Support\Sidebar\Item;

class RolesAndPermissions extends Plugin
{
    public function sidebar()
    {
        $roles = Item::create(__('app.roles'))
            ->route('roles.index')
            ->active("roles*")
            ->permissions('roles.manage');

        $permissions = Item::create(__('app.permissions'))
            ->route('permissions.index')
            ->active("permissions*")
            ->permissions('permissions.manage');

        return Item::create(__('app.roles_&_permissions'))
            ->href('#roles-dropdown')
            ->icon('fas fa-users-cog')
            ->permissions(['roles.manage', 'permissions.manage'])
            ->addChildren([
                $roles,
                $permissions
            ]);
    }
}
