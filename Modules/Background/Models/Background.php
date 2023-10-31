<?php

namespace Modules\Background\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Support\Enum\BackgroundType;

class Background extends Model implements HasMedia
{
    use HasFactory  , InteractsWithMedia;

    protected $fillable = ['type'];


    public static function backgroundTypes()
    {
        return BackgroundType::lists();
    }


    protected static function newFactory()
    {
        return \Modules\Background\Database\factories\BackgroundFactory::new();
    }
}
