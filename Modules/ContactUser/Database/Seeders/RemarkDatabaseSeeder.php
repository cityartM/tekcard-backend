<?php

namespace Modules\ContactUser\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RemarkDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Model::unguard();
        \DB::table('remarks')->insert([
            [
                'title' => 'Boss',
                'color' => '#FF0000',
                'user_id' => 1, // Replace with the appropriate user_id
            ],
            [
                'title' => 'Customer',
                'color' => '#008000',
                'user_id' => 1, // Replace with the appropriate user_id
            ],
            // Add more records as needed
            [
                'title' => 'Friend',
                'color' => '#0000FF',
                'user_id' => 1, // Replace with the appropriate user_id
            ],
            [
                'title' => 'Co-worker',
                'color' => '#FFFF00',
                'user_id' => 1, // Replace with the appropriate user_id
            ]
        ]);
    }
}
