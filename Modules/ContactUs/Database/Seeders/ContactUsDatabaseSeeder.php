<?php

namespace Modules\ContactUs\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ContactUsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('contact_us')->insert([
            [
                'first_name' => 'John',
                'company' => 'Doe',
                'email' => 'john.doe@example.com',
                'subject' => 'test',
                'message' => 'This is a sample message from John Doe.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'John',
                'company' => 'Doe',
                'email' => 'john.doe@example.com',
                'subject' => 'test',
                'message' => 'This is a sample message from John Doe.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'John',
                'company' => 'Doe',
                'email' => 'john.doe@example.com',
                'subject' => 'test',
                'message' => 'This is a sample message from John Doe.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'John',
                'company' => 'Doe',
                'email' => 'john.doe@example.com',
                'subject' => 'test',
                'message' => 'This is a sample message from John Doe.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
