<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;


class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::where('name', 'Admin')->first();

        $permissions[] = Permission::create([
            'name' => 'users.manage',
            'display_name' => 'Manage Users',
            'description' => 'Manage users and their sessions.',
            'removable' => false
        ]);

        $permissions[] = Permission::create([
            'name' => 'users.activity',
            'display_name' => 'View System Activity Log',
            'description' => 'View activity log for all system users.',
            'removable' => false
        ]);

        $permissions[] = Permission::create([
            'name' => 'roles.manage',
            'display_name' => 'Manage Roles',
            'description' => 'Manage system roles.',
            'removable' => false
        ]);

        $permissions[] = Permission::create([
            'name' => 'permissions.manage',
            'display_name' => 'Manage Permissions',
            'description' => 'Manage role permissions.',
            'removable' => false
        ]);

        $permissions[] = Permission::create([
            'name' => 'settings.general',
            'display_name' => 'Update General System Settings',
            'description' => '',
            'removable' => false
        ]);

        $permissions[] = Permission::create([
            'name' => 'settings.auth',
            'display_name' => 'Update Authentication Settings',
            'description' => 'Update authentication and registration system settings.',
            'removable' => false
        ]);

        $permissions[] = Permission::create([
            'name' => 'settings.notifications',
            'display_name' => 'Update Notifications Settings',
            'description' => '',
            'removable' => false
        ]);


        $permissions[] = Permission::create([
            'name' => 'address.manage',
            'display_name' => 'Manage Addresses',
            'description' => '',
            'removable' => false
        ]);

        $permissions[] = Permission::create([
            'name' => 'plans.manage',
            'display_name' => 'Manage Plans',
            'description' => '',
            'removable' => false
        ]);

        $permissions[] = Permission::create([
            'name' => 'strategies.manage',
            'display_name' => 'Manage Strategies',
            'description' => '',
            'removable' => false
        ]);

        $permissions[] = Permission::create([
            'name' => 'advices.manage',
            'display_name' => 'Manage Advices',
            'description' => '',
            'removable' => false
        ]);

        $permissions[] = Permission::create([
            'name' => 'motivationalPhrases.manage',
            'display_name' => 'Manage motivational phrases',
            'description' => '',
            'removable' => false
        ]);

        $permissions[] = Permission::create([
            'name' => 'helps.manage',
            'display_name' => 'Manage helps',
            'description' => '',
            'removable' => false
        ]);

        $permissions[] = Permission::create([
            'name' => 'subscriptions.manage',
            'display_name' => 'Subscription',
            'description' => '',
            'removable' => false
        ]);

        $permissions[] = Permission::create([
            'name' => 'strategies.manage',
            'display_name' => 'strategy',
            'description' => '',
            'removable' => false
        ]);

        $adminRole->attachPermissions($permissions);
    }
}
