<?php

namespace Modules\Blog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Modules\Tag\Models\Tag;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;
use App\Traits\HasGoogleTranslationTrait;
use Staudenmeir\EloquentJsonRelations\HasJsonRelationships;
use Staudenmeir\EloquentJsonRelations\Relations\BelongsToJson;

class Blog extends Model implements HasMedia
{
    use InteractsWithMedia,HasTranslations;

    protected $fillable = ['title', 'status' ,'tag_ids','content', 'text' , 'thumbnail', 'gallery'];

    protected $casts = [
        'title' => 'json',
        'text' => 'json',
        'tag_ids' => 'array',
    ];

    protected array $translatable = ['title','content','text'];

    public function tags(): BelongsToJson
    {
        return $this->belongsToJson(Tag::class, 'tag_ids[]->tag_id');
    }

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

    // Function to get the 'content' in the current locale
    public function getJsonContentAttribute($value)
    {
        $content = $this->getTranslations('content');
        $currentLocale = Helper::checkApiLanguage(); // You may need to adjust this line
        $result = [];
        if ($content != null) {
            foreach ($content as $translation) {
                foreach ($translation as $locale => $trans) {
                    if ($locale == $currentLocale) {
                        $result[] = $trans;
                    }
                }
            }
            return $result;
        } else {
            return $content;
        }
    }


    public function getJsonTextAttribute($value)
    {
        $text = $this->getTranslations('text');
        $currentLocale = Helper::checkApiLanguage(); // You may need to adjust this line
        $result = [];
        if ($text != null) {
            foreach ($text as $translation) {
                foreach ($translation as $locale => $trans) {
                    if ($locale == $currentLocale) {
                        $result[] = $trans;
                    }
                }
            }
            return $result;
        } else {
            return $text;
        }
    }

    public function getBladeTitleAttribute($value)
    {
        return $this->getTranslations('title');
    }

    public function getBladeContentAttribute($value)
    {
        return $this->getTranslations('content');
    }

    public function getBladeTextAttribute($value)
    {
        return $this->getTranslations('text');
    }

    public function type()
    {
        return $this->belongsTo(Tag::class);
    }



    protected static function newFactory()
    {
        return \Modules\Blog\Database\factories\BlogFactory::new();
    }
}
