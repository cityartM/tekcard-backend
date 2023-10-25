<?php

namespace Modules\ContactUser\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class GroupDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Model::unguard();
        \DB::table('groups')->insert([
            [
                'display_name' => 'Friends',
                'user_id' => 1, // Replace with the appropriate user_id
            ],
            [
                'display_name' => '	Workes',
                'user_id' => 1, // Replace with the appropriate user_id
            ],
            [
                'display_name' => 'Family',
                'user_id' => 1, // Replace with the appropriate user_id
            ],
            [
                'display_name' => '	Other',
                'user_id' => 1, // Replace with the appropriate user_id
            ],
        ]);
    }
}
