<?php

namespace Database\Factories;


use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;

class ImageFactory
{
    public static array $cachedFileImagesInstances = [];

    public static function fake()
    {
        return new self();
    }

    public function create($topic = 'ads_images')
    {
        // get a random image url from the fake images directory
        $generated = $this->getRandomImage($topic);
        if (!isset(self::$cachedFileImagesInstances[$generated])){
            self::$cachedFileImagesInstances[$generated] = new File(public_path($generated));
        }
        $file = self::$cachedFileImagesInstances[$generated];
        // fake the uploaded file
        return UploadedFile::fake()->createWithContent($file->getFilename(), $file->getContent());
    }

    private function getRandomImage($topic = 'ads_images')
    {
        return $this->$topic[array_rand($this->$topic)];
    }

    public $ads_images = [
        'fake_images/ads_pic (1).jpg',
        'fake_images/ads_pic (2).jpg',
        'fake_images/ads_pic (3).jpg',
        'fake_images/ads_pic (4).jpg',
        'fake_images/ads_pic (5).jpg',
        'fake_images/ads_pic (6).jpg',
        'fake_images/ads_pic (7).jpg',
        'fake_images/ads_pic (8).jpg',
        'fake_images/ads_pic (9).jpg',
        'fake_images/ads_pic (10).jpg',
        'fake_images/ads_pic (11).jpg',
        'fake_images/ads_pic (12).jpg',
        'fake_images/ads_pic (13).jpg',
        'fake_images/ads_pic (14).jpg',
    ];

}
