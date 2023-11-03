<?php

namespace Modules\Tag\Database\Seeders;

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

       // create 10 tags
        $tags = [
            [
                'name' => [
                    'en' => 'Tag 1',
                    'ar' => 'العلامة 1',
                    'tr' => 'Etiket 1',
                ],
            ],
            [
                'name' => [
                    'en' => 'Tag 2',
                    'ar' => 'العلامة 2',
                    'tr' => 'Etiket 2',
                ],
            ],
            [
                'name' => [
                    'en' => 'Tag 3',
                    'ar' => 'العلامة 3',
                    'tr' => 'Etiket 3',
                ],
            ],
            [
                'name' => [
                    'en' => 'Tag 4',
                    'ar' => 'العلامة 4',
                ],
            ],
            [
                'name' => [
                    'en' => 'Tag 5',
                    'ar' => 'العلامة 5',
                    'tr' => 'Etiket 5',
                ],
            ],
            [
                'name' => [
                    'en' => 'Tag 6',
                    'ar' => 'العلامة 6',
                    'tr' => 'Etiket 6',
                ],
            ],
            [
                'name' => [
                    'en' => 'Tag 7',
                    'ar' => 'العلامة 7',
                    'tr' => 'Etiket 7',
                ],
            ],
            [
                'name' => [
                    'en' => 'Tag 8',
                    'ar' => 'العلامة 8',
                    'tr' => 'Etiket 8',
                ],
            ],
            [
                'name' => [
                    'en' => 'Tag 9',
                    'ar' => 'العلامة 9',
                    'tr' => 'Etiket 9',
                ],
            ],
            [
                'name' => [
                    'en' => 'Tag 10',
                    'ar' => 'العلامة 10',
                    'tr' => 'Etiket 10',
                ],
            ],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
