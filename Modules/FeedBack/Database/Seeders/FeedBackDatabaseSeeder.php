<?php

namespace Modules\FeedBack\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FeedBackDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('feedbacks')->insert([
            [
                'user_id' => 1, // Replace with a valid user_id
                'comment' => 'This is a sample feedback comment.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1, // Replace with another valid user_id
                'comment' => 'Another sample feedback comment.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1, // Replace with another valid user_id
                'comment' => 'Another sample feedback comment.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1, // Replace with another valid user_id
                'comment' => 'Another sample feedback comment.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
