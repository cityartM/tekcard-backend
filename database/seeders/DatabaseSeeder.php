<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Background\Database\Seeders\BackgroundDatabaseSeeder;
use Modules\Blog\Database\Seeders\BlogDatabaseSeeder;
use Modules\Card\Database\Seeders\CardDatabaseSeeder;
use Modules\ContactUser\Database\Seeders\GroupDatabaseSeeder;
use Modules\ContactUser\Database\Seeders\RemarkDatabaseSeeder;
use Modules\Feature\Database\Seeders\FeatureDatabaseSeeder;
use Modules\GlobalSetting\Database\Seeders\GlobalSettingDatabaseSeeder;
use Modules\Plan\Database\Seeders\PlanDatabaseSeeder;
use Modules\Strategy\Database\Seeders\StrategyDatabaseSeeder;
use Modules\Tag\Database\Seeders\TagDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(TranslationSeeder::class);
        $this->call(CountriesSeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(PermissionsSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PlanDatabaseSeeder::class);
        $this->call(RemarkDatabaseSeeder::class);
        $this->call(GroupDatabaseSeeder::class);
        $this->call(GlobalSettingDatabaseSeeder::class);
        $this->call(FeatureDatabaseSeeder::class);
        $this->call(TagDatabaseSeeder::class);
        $this->call(CardDatabaseSeeder::class);
        $this->call(BackgroundDatabaseSeeder::class);
        $this->call(BlogDatabaseSeeder::class);
        Model::reguard();
    }
}
