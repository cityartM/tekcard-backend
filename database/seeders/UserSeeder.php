<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Support\Enum\UserStatus;
use App\Models\Role;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = Role::where('name', 'Admin')->first();

        User::create([
            'first_name' => 'Daoud Belmerabet',
            'email' => 'admin@admin.com',
            'username' => 'admin',
            'password' => 'admin123',
            'avatar' => null,
            //'country_id' => null,
            'city_id' => '1',
            'role_id' => $admin->id,
            'status' => UserStatus::ACTIVE,
            'email_verified_at' => now(),
        ]);
    }
}
