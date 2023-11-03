<?php

namespace Modules\Blog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Modules\Tag\Models\Tag;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
//use Staudenmeir\EloquentJsonRelations\HasJsonRelationships;
use Staudenmeir\EloquentJsonRelations\HasJsonRelationships;
use Staudenmeir\EloquentJsonRelations\Relations\BelongsToJson;
use Spatie\Translatable\HasTranslations;;
//use App\Traits\HasGoogleTranslationTrait;

class Blog extends Model implements HasMedia
{

    use InteractsWithMedia;

    use HasTranslations,HasJsonRelationships {
        HasTranslations::getAttributeValue insteadof HasJsonRelationships;
    }

    /*use HasJsonRelationships {
         HasJsonRelationships::getAttributeValue insteadof HasTranslations;
    }*/




    protected $fillable = ['title', 'status' ,'tag_ids','content', 'text' , 'thumbnail', 'gallery'];

    protected $casts = [
        'title' => 'json',
        'text' => 'json',
        'tag_ids' => 'array',
    ];

    protected array $translatable = ['title','content','text'];

    public function tags()
    {
        return  Tag::whereIn('id', $this->tag_ids)->get();
    }




}
