<?php

namespace Modules\Subscription\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SubscriptionDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('subscriptions')->insert([
            [
                'email' => 'example1@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'example2@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'example3@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'example4@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }
}
