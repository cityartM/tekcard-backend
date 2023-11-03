<?php

namespace Modules\Tag\Database\Seeders;

use App\Support\Enum\BlogCategories;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Tag\Models\Tag;

class TagDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        collect(BlogCategories::lists())->each(function ($category) {
            Tag::create([
                'name' => [
                    'en' => trans('app.categories.' . $category, locale: "en"),
                    'ar' => trans('app.categories.' . $category, locale: "ar"),
                    'tr' => trans('app.categories.' . $category, locale: "tr")
                ]
            ]);
        });


    }
}
