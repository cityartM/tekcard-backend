<?php

namespace Modules\Feature\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Feature\Models\Feature;
use Modules\Plan\Models\Plan;

class FeatureDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $planCompany = Plan::where('name', 'standard_company_yearly')->first();
        $planClient = Plan::where('name', 'standard_client_yearly')->first();

        $features[] = Feature::create([
            'name' => 'Feature-1',
            'display_name' => ['en' => 'Choose from additional card designs and styles', 'ar' => 'ختر من البطاقة الإضافية','tr' => 'Ek kart arasından seçim yapın'],
            'removable' => true,
            'user_id' => 1,
        ]);

        $features[] = Feature::create([
            'name' => 'Feature-2',
            'display_name' => ['en' => 'Brand your QR code and link ', 'ar' => 'العلامة التجارية لرمز الاستجابة السريعة الخاص بك والرابط','tr' => 'QR kodunuzu ve bağlantınızı markalayın'],
            'removable' => true,
            'user_id' => 1,
        ]);

        $features[] = Feature::create([
            'name' => 'Feature-3',
            'display_name' => ['en' => 'Add video', 'ar' => 'أضف فيديو','tr' => 'Video ekle'],
            'removable' => true,
            'user_id' => 1,
        ]);

        $features[] = Feature::create([
            'name' => 'Feature-4',
            'display_name' => ['en' => 'Access your card\'s analytic ', 'ar' => 'الوصول إلى تحليل بطاقتك','tr' => 'Kartınızın analitiğine erişin'],
            'removable' => true,
            'user_id' => 1,
        ]);

        $planCompany->attachFeatures($features);
        $planClient->attachFeatures($features);
    }
}
