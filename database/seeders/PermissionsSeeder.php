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
        $adminITRole = Role::where('name', 'Admin-IT')->first();
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
            'name' => 'companies.manage',
            'display_name' => 'Manage Companies',
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
            'name' => 'features.manage',
            'display_name' => 'Manage Features',
            'description' => '',
            'removable' => false
        ]);

        $permissions[] = Permission::create([
            'name' => 'subscriptions.manage',
            'display_name' => 'Manage subscriptions',
            'description' => 'Manage subscriptions',
            'removable' => false
        ]);

        $permissions[] = Permission::create([
            'name' => 'contactus.manage',
            'display_name' => 'Manage ContactUs',
            'description' => 'Manage ContactUs',
            'removable' => false
        ]);

        $permissions[] = Permission::create([
            'name' => 'feedback.manage',
            'display_name' => 'Manage Feedback',
            'description' => 'Manage Feedback',
            'removable' => false
        ]);
        $permissions[] = Permission::create([
            'name' => 'blogs.manage',
            'display_name' => 'Manage Blogs',
            'description' => 'Manage Blogs',
            'removable' => false
        ]);
        $permissions[] = Permission::create([
            'name' => 'groups.manage',
            'display_name' => 'Manage groups',
            'description' => 'Manage groups',
            'removable' => false
        ]);
        $permissions[] = Permission::create([
            'name' => 'remarks.manage',
            'display_name' => 'Manage remarks',
            'description' => 'Manage remarks',
            'removable' => false
        ]);
        $adminITRole->attachPermissions($permissions);
        $adminRole->attachPermissions($permissions);
    }
}
