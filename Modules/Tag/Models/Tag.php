<?php

namespace Modules\Tag\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Blog\Models\Blog;
use Spatie\Translatable\HasTranslations;
use App\Traits\HasGoogleTranslationTrait;
use Staudenmeir\EloquentJsonRelations\Relations\HasManyJson;

class Tag extends Model
{
    use HasFactory ,HasTranslations;

    protected $table = 'tags';

    protected $fillable = ['name'];

    protected $casts = [
        'name' => 'json',
    ];

    protected array $translatable = ['name'];

}
