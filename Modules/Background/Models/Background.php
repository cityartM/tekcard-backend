<?php

namespace Modules\Background\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Card\Models\Card;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Support\Enum\BackgroundType;

class Background extends Model implements HasMedia
{
    use HasFactory  , InteractsWithMedia;

    protected $fillable = ['type','user_id'];


    public function cards()
    {
        return $this->hasMany(Card::class);
    }

}
