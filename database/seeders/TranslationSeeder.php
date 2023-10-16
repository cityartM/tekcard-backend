<?php

namespace Database\Seeders;

use App\Models\Translation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\MediaLibrary\HasMedia;

class TranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Translations: ');
        $languages = config('translation.locales');

        foreach ($languages as $key => $value) {
            $locale = $key;
            $name = $value;
            $file_path = resource_path('lang/' . $locale . '.json');


            /** @var HasMedia $translation */
            $translation = Translation::create([
                'locale' => $locale,
                'name' => $name,
                'file_path' => $file_path,
            ]);

            /*$translation->addMedia($file_path)
                ->preservingOriginal()
                ->toMediaCollection('translations');*/

            $translation->addMedia(public_path('slider/1.png'))
                ->preservingOriginal()
                ->toMediaCollection('hero');

            for ($i=1; $i < 6; $i++) {
                $translation->addMedia(public_path('slider/'.$i.'.png'))
                    ->preservingOriginal()
                    ->toMediaCollection('slider');
            }

            $this->command->info('Translation created: ' . $translation->name);
        }
        
    }
}
