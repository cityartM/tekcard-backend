<?php

namespace Modules\Card\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Card\Models\Card;

class CardDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        /*protected $fillable = ['reference','name', 'full_name', 'company_name', 'company_id', 'job_title', 'background_id', 'color', 'is_single_link', 'single_link_contact_id','is_main', 'user_id'];

    protected $casts = [
        'is_single_link' => 'boolean',
        'is_main' => 'boolean',
    ];*/

        Card::factory()->count(10)->create();


        Model::unguard(false);
    }
}
