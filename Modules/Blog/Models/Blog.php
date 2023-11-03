<?php

namespace Modules\Blog\Models;

use App\Traits\HasGoogleTranslationTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Modules\Tag\Models\Tag;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Blog extends Model implements HasMedia
{

    use InteractsWithMedia,HasGoogleTranslationTrait;


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
