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
    { $data = [
        [
            'full_name' => 'John Doe',
            'company' => 'ABC Company',
            'email' => 'john.doe@example.com',
            'subject' => 'Inquiry',
            'message' => 'This is a sample message from John Doe.',
        ],
        [
            'full_name' => 'Jane Smith',
            'company' => 'XYZ Corporation',
            'email' => 'jane.smith@example.com',
            'subject' => 'Support Request',
            'message' => 'This is a sample message from Jane Smith.',
        ],
        [
            'full_name' => 'Alice Johnson',
            'company' => null,
            'email' => 'alice.johnson@example.com',
            'subject' => 'Feedback',
            'message' => 'This is a sample message from Alice Johnson.',
        ],
        [
            'full_name' => 'Bob Brown',
            'company' => '123 Enterprises',
            'email' => 'bob.brown@example.com',
            'subject' => 'Question',
            'message' => 'This is a sample message from Bob Brown.',
        ],
    ];

    // Insert the data into the "contacts_us" table
    DB::table('contacts_us')->insert($data);
}
    }

