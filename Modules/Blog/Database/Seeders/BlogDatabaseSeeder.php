<?php

namespace Modules\Blog\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Add this line
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

use App\Support\Enum\BlogCategories;
use App\Support\Enum\Status;
use Modules\Blog\Models\Blog;

class BlogDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $blogs = [
            [
                'title' => [
                    'en' => 'Sample Blog Title 1',
                    'ar' => 'عنوان مدونة عينة 1',
                    'tr' => 'Örnek Blog Başlığı 1',
                ],
                'status' => Status::PUBLISHED,
                'tag_ids' =>[["tag_id" => 1],["tag_id" => 2]],
                'text' => [
                    'en' => `<p style="text-align: left;"><span style="font-family: Tajawal, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'; font-size: 18px; background-color: #f8fafc;">Illo sint voluptas. Error voluptates culpa eligendi. Hic vel totam vitae illo. Non aliquid explicabo necessitatibus unde. Sed exercitationem placeat consectetur nulla deserunt vel. Iusto corrupti dicta.</span></p>`,
                    'ar' => `<p style="text-align: left;"><span style="font-family: Tajawal, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'; font-size: 18px; background-color: #f8fafc;">دعهم يكون من دواعي سروره. إنه خطأ اختيار الملذات الخاطئة. هنا أو طوال حياته. لن أشرح أي شيء عما يجب القيام به. ولكن يجب أن يتبع التدريب عدم الهجر أيضًا. وقيل أنه مجرد فاسد.</span></p>`,
                    'tr' => `<p style="text-align: left;"><span style="font-family: Tajawal, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'; font-size: 18px; background-color: #f8fafc;">Bırakın bunlar onun zevki olsun. Yanlış zevkleri seçmek hatadır. Burada ya da tüm hayatı boyunca. Ne yapılması gerektiği konusunda herhangi bir açıklama yapmayacağım. Ancak eğitimin ardından hiçbir firar da gelmemelidir. Sadece yolsuzluk olduğu söylendi.</span></p>`,
                ],
                'content' => [
                    'en' => 'Text for Blog 1',
                    'ar' => 'نص للمدونة 1',
                    'tr' => 'Blog 1 için metin',
                ],
            ],
            [
                'title' => [
                    'en' => 'Sample Blog Title 2',
                    'ar' => 'عنوان مدونة عينة 2',
                    'tr' => 'Örnek Blog Başlığı 2',
                ],
                'status' => Status::PUBLISHED,
                'tag_ids' => [["tag_id" => 2],["tag_id" => 3],["tag_id" => 4]],
                'text' => [
                    'en' => `<p style="text-align: left;"><span style="font-family: Tajawal, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'; font-size: 18px; background-color: #f8fafc;">Illo sint voluptas. Error voluptates culpa eligendi. Hic vel totam vitae illo. Non aliquid explicabo necessitatibus unde. Sed exercitationem placeat consectetur nulla deserunt vel. Iusto corrupti dicta.</span></p>`,
                    'ar' => `<p style="text-align: left;"><span style="font-family: Tajawal, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'; font-size: 18px; background-color: #f8fafc;">دعهم يكون من دواعي سروره. إنه خطأ اختيار الملذات الخاطئة. هنا أو طوال حياته. لن أشرح أي شيء عما يجب القيام به. ولكن يجب أن يتبع التدريب عدم الهجر أيضًا. وقيل أنه مجرد فاسد.</span></p>`,
                    'tr' => `<p style="text-align: left;"><span style="font-family: Tajawal, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'; font-size: 18px; background-color: #f8fafc;">Bırakın bunlar onun zevki olsun. Yanlış zevkleri seçmek hatadır. Burada ya da tüm hayatı boyunca. Ne yapılması gerektiği konusunda herhangi bir açıklama yapmayacağım. Ancak eğitimin ardından hiçbir firar da gelmemelidir. Sadece yolsuzluk olduğu söylendi.</span></p>`,
                ],
                'content' => [
                    'en' => 'Text for Blog 2',
                    'ar' => 'نص للمدونة 2',
                    'tr' => 'Örnek Blog Başlığı 2',
                ],
            ],
            [
                'title' => [
                    'en' => 'Sample Blog Title 3',
                    'ar' => 'عنوان مدونة عينة 3',
                    'tr' => 'Örnek Blog Başlığı 3',
                ],
                'status' => Status::PUBLISHED,
                'tag_ids' => [["tag_id" => 4],["tag_id" => 5],["tag_id" => 6]],
                'text' => [
                    'en' => `<p style="text-align: left;"><span style="font-family: Tajawal, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'; font-size: 18px; background-color: #f8fafc;">Illo sint voluptas. Error voluptates culpa eligendi. Hic vel totam vitae illo. Non aliquid explicabo necessitatibus unde. Sed exercitationem placeat consectetur nulla deserunt vel. Iusto corrupti dicta.</span></p>`,
                    'ar' => `<p style="text-align: left;"><span style="font-family: Tajawal, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'; font-size: 18px; background-color: #f8fafc;">دعهم يكون من دواعي سروره. إنه خطأ اختيار الملذات الخاطئة. هنا أو طوال حياته. لن أشرح أي شيء عما يجب القيام به. ولكن يجب أن يتبع التدريب عدم الهجر أيضًا. وقيل أنه مجرد فاسد.</span></p>`,
                    'tr' => `<p style="text-align: left;"><span style="font-family: Tajawal, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'; font-size: 18px; background-color: #f8fafc;">Bırakın bunlar onun zevki olsun. Yanlış zevkleri seçmek hatadır. Burada ya da tüm hayatı boyunca. Ne yapılması gerektiği konusunda herhangi bir açıklama yapmayacağım. Ancak eğitimin ardından hiçbir firar da gelmemelidir. Sadece yolsuzluk olduğu söylendi.</span></p>`,
                ],
                'content' => [
                    'en' => 'Text for Blog 3',
                    'ar' => 'نص للمدونة 3',
                    'tr' => 'Örnek Blog Başlığı 3',
                ],
            ],
            // Add more blog entries as needed
        ];

        // Insert data into the 'blogs' table
        foreach ($blogs as $key => $blog) {
           $blog = Blog::create($blog);
            $blog->addMediaFromUrl(arrayUrl[$key])->toMediaCollection('thumbnail');
        }

    }
}

const arrayUrl = [
    'https://media.istockphoto.com/id/1357880769/photo/cropped-shot-of-an-unrecognisable-businessman-sitting-alone-and-using-his-cellphone-in-his.jpg?s=1024x1024&w=is&k=20&c=ygSR1wlIY6SorbBuhD8FqvKy0dcoM0bxnvEZgovage8=',
    'https://media.istockphoto.com/id/1352603244/photo/shot-of-an-unrecognizable-businessman-working-on-his-laptop-in-the-office.jpg?s=1024x1024&w=is&k=20&c=mTABddPRSU1r_hCBpknMjJbCIrJAicjjXGSU42rx-YI=',
    'https://media.istockphoto.com/id/1432084413/photo/closeup-image-of-a-woman-working-and-touching-on-laptop-computer-touchpad.jpg?s=2048x2048&w=is&k=20&c=krU3xIh-JfiR6axH3sn6SpZeN4LPH1R0Ieq0YezkDB8='
];
