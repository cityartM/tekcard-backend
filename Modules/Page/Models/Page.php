<?php

namespace Modules\Page\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Page\Database\factories\PageFactory;

use App\Traits\HasGoogleTranslationTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Page extends Model implements HasMedia
{
    use HasGoogleTranslationTrait,InteractsWithMedia;

    protected $table = 'pages';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name','title','short_description', 'description'];


    protected $casts = [
        'title' => 'json',
        'short_description' => 'json',
        'description' => 'json',
    ];

    protected array $translatable = ['title','short_description','description'];


    
    
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('thumbnail')->singleFile()->registerMediaConversions(function () {
            $this->addMediaConversion('thumb')->width(368)->height(232);
        });
        
    }
}