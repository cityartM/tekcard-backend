<?php

namespace Modules\AboutCard\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Helpers\Helper;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;
use App\Traits\HasGoogleTranslationTrait;

class AboutCard extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia , HasTranslations;


    protected $fillable = ['title','description'];

    protected $casts = [
        'title' => 'json',
        'description' => 'json',
    ];
    
    protected array $translatable = ['title','description'];


    public function getJsonTitleAttribute($value)
    {
        $title = $this->getTranslations('title');
        $currentLocale = Helper::checkApiLanguage(); // You may need to adjust this line
        $result = [];
        if ($title != null) {
            foreach ($title as $translation) {
                foreach ($translation as $locale => $trans) {
                    if ($locale == $currentLocale) {
                        $result[] = $trans;
                    }
                }
            }
            return $result;
        } else {
            return $title;
        }
    }

    // Function to get the 'Description' in the current locale
    public function getJsonDescriptionAttribute($value)
    {
        $description = $this->getTranslations('description');
        $currentLocale = Helper::checkApiLanguage(); // You may need to adjust this line
        $result = [];
        if ($description != null) {
            foreach ($description as $translation) {
                foreach ($translation as $locale => $trans) {
                    if ($locale == $currentLocale) {
                        $result[] = $trans;
                    }
                }
            }
            return $result;
        } else {
            return $Description;
        }
    }

    public function getBladeTitleAttribute($value)
    {
        return $this->getTranslations('title');
    }

    public function getBladeDescriptionAttribute($value)
    {
        return $this->getTranslations('description');
    }



    protected static function newFactory()
    {
        return \Modules\AboutCard\Database\factories\AboutCardFactory::new();
    }
}
