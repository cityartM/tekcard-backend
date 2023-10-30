<?php

namespace Modules\Tag\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;
use App\Traits\HasGoogleTranslationTrait;

class Tag extends Model
{
    use HasFactory ,HasTranslations;

    protected $table = 'tags'; 

    protected $fillable = ['name']; 

    protected $casts = [
        'name' => 'json',
    ];
    
    protected array $translatable = ['name'];


    public function getJsonNameAttribute($value)
    {
        $name = $this->getTranslations('name');
        $currentLocale = Helper::checkApiLanguage();
        $result = [];
        if ($name != null) {
            foreach ($name as $translation) {
                foreach ($translation as $locale => $trans) {
                    if ($locale == $currentLocale) {
                        $result[] = $trans;
                    }
                }
            }
            return $result;
        } else {
            return $name;
        }
    }



    protected static function newFactory()
    {
        return \Modules\Tag\Database\factories\TagFactory::new();
    }
}
