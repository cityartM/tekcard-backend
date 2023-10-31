<?php

namespace Modules\Plan\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Plan\Support\Enum\PlanDuration;
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
                'name' => 'free_company_yearly',
                'display_name' => json_encode(['en' => 'Free/Yearly', 'ar' => 'مجاني','tr' => 'Özgür']),
                'type' => PlanType::COMPANY,
                'duration' => PlanDuration::YEARLY,
                'nbr_user' => 10,
                'nbr_card_user' => 1,
                'has_dashboard' => true,
                'removable' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'free_company_monthly',
                'display_name' => json_encode(['en' => 'Free/Monthly', 'ar' => 'مجاني','tr' => 'Özgür']),
                'type' => PlanType::COMPANY,
                'duration' => PlanDuration::MONTHLY,
                'nbr_user' => 10,
                'nbr_card_user' => 1,
                'has_dashboard' => true,
                'removable' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'standard_company_yearly',
                'display_name' => json_encode(['en' => 'Standard/Yearly', 'ar' => 'عادي','tr' => 'Standart']),
                'type' => PlanType::COMPANY,
                'duration' => PlanDuration::YEARLY,
                'nbr_user' => 20,
                'nbr_card_user' => 3,
                'has_dashboard' => true,
                'removable' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'standard_company_monthly',
                'display_name' => json_encode(['en' => 'Standard/Monthly', 'ar' => 'عادي','tr' => 'Standart']),
                'type' => PlanType::COMPANY,
                'duration' => PlanDuration::MONTHLY,
                'nbr_user' => 20,
                'nbr_card_user' => 3,
                'has_dashboard' => true,
                'removable' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'premium_company_yearly',
                'display_name' => json_encode(['en' => 'Premium/Yearly', 'ar' => 'بريميوم','tr'=>'Ödül']),
                'type' => PlanType::COMPANY,
                'duration' => PlanDuration::YEARLY,
                'nbr_user' => 70,
                'nbr_card_user' => 10,
                'has_dashboard' => true,
                'removable' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'premium_company_monthly',
                'display_name' => json_encode(['en' => 'Premium/Monthly', 'ar' => 'بريميوم','tr'=>'Ödül']),
                'type' => PlanType::COMPANY,
                'duration' => PlanDuration::MONTHLY,
                'nbr_user' => 70,
                'nbr_card_user' => 10,
                'has_dashboard' => true,
                'removable' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'free_client_yearly',
                'display_name' => json_encode(['en' => 'Free/yearly', 'ar' => 'مجاني','tr' => 'Özgür']),
                'type' => PlanType::CLIENT,
                'duration' => PlanDuration::YEARLY,
                'nbr_user' => 1,
                'nbr_card_user' => 1,
                'has_dashboard' => false,
                'removable' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'free_client_monthly',
                'display_name' => json_encode(['en' => 'Free/Monthly', 'ar' => 'مجاني','tr' => 'Özgür']),
                'type' => PlanType::CLIENT,
                'duration' => PlanDuration::MONTHLY,
                'nbr_user' => 1,
                'nbr_card_user' => 1,
                'has_dashboard' => false,
                'removable' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'standard_client_yearly',
                'display_name' => json_encode(['en' => 'Standard/Yearly', 'ar' => 'عادي','tr' => 'Standart']),
                'type' => PlanType::CLIENT,
                'duration' => PlanDuration::YEARLY,
                'nbr_user' => 1,
                'nbr_card_user' => 5,
                'has_dashboard' => true,
                'removable' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'standard_client_monthly',
                'display_name' => json_encode(['en' => 'Standard/Monthly', 'ar' => 'عادي','tr' => 'Standart']),
                'type' => PlanType::CLIENT,
                'duration' => PlanDuration::MONTHLY,
                'nbr_user' => 1,
                'nbr_card_user' => 5,
                'has_dashboard' => true,
                'removable' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'premium_client_yearly',
                'display_name' => json_encode(['en' => 'Premium/Yearly', 'ar' => 'بريميوم','tr'=>'Ödül']),
                'type' => PlanType::CLIENT,
                'duration' => PlanDuration::YEARLY,
                'nbr_user' => 1,
                'nbr_card_user' => 10,
                'has_dashboard' => true,
                'removable' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'premium_client_monthly',
                'display_name' => json_encode(['en' => 'Premium/Monthly', 'ar' => 'بريميوم','tr'=>'Ödül']),
                'type' => PlanType::CLIENT,
                'duration' => PlanDuration::MONTHLY,
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
