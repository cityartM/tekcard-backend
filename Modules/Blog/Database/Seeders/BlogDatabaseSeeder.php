<?php

namespace Modules\Blog\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Add this line
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

use App\Support\Enum\BlogCategories;
use App\Support\Enum\Status;

class BlogDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            $title = [
                'en' => $faker->sentence,
                'ar' => $faker->sentence,
                'tr' => $faker->sentence,
            ];

            $content = [
                'en' => $faker->paragraph,
                'ar' => $faker->paragraph,
                'tr' => $faker->paragraph,
            ];

            DB::table('blogs')->insert([
                'title' => json_encode($title),
                'status' => $faker->randomElement(Status::lists()),
                'type' => $faker->randomElement(BlogCategories::lists()),
                'content' => json_encode($content),
                'tumail' => $faker->email,
                'gallery' => json_encode(['image1.jpg', 'image2.jpg']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}