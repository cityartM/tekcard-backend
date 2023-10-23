<?php

namespace Modules\Plan\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Plan\Support\Enum\PlanType;

class PlanDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Model::unguard();

        \DB::table('plans')->insert([
            [
                'name' => 'Free-Company',
                'display_name' => json_encode(['en' => 'Free', 'ar' => 'مجاني','tr' => 'Özgür']),
                'type' => PlanType::COMPANY,
                'nbr_user' => 10,
                'nbr_card_user' => 1,
                'has_dashboard' => true,
                'removable' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Standard-Company',
                'display_name' => json_encode(['en' => 'Standard', 'ar' => 'عادي','tr' => 'Standart']),
                'type' => PlanType::COMPANY,
                'nbr_user' => 20,
                'nbr_card_user' => 3,
                'has_dashboard' => true,
                'removable' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Premium-Company',
                'display_name' => json_encode(['en' => 'Premium', 'ar' => 'بريميوم','tr'=>'Ödül']),
                'type' => PlanType::COMPANY,
                'nbr_user' => 70,
                'nbr_card_user' => 10,
                'has_dashboard' => true,
                'removable' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Free-Client',
                'display_name' => json_encode(['en' => 'Free', 'ar' => 'مجاني','tr' => 'Özgür']),
                'type' => PlanType::CLIENT,
                'nbr_user' => 1,
                'nbr_card_user' => 1,
                'has_dashboard' => false,
                'removable' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Standard-Client',
                'display_name' => json_encode(['en' => 'Standard', 'ar' => 'عادي','tr' => 'Standart']),
                'type' => PlanType::CLIENT,
                'nbr_user' => 1,
                'nbr_card_user' => 5,
                'has_dashboard' => true,
                'removable' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Premium-Client',
                'display_name' => json_encode(['en' => 'Premium', 'ar' => 'بريميوم','tr'=>'Ödül']),
                'type' => PlanType::CLIENT,
                'nbr_user' => 1,
                'nbr_card_user' => 10,
                'has_dashboard' => true,
                'removable' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more plan data as needed
        ]);
    }
}
