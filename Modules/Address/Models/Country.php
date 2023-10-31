<?php

namespace Modules\Address\Models;

use App\Traits\HasGoogleTranslationTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use HasFactory;
    use HasGoogleTranslationTrait;
    protected $table = 'countries';
    protected $fillable = ['name', 'code', 'lat', 'lon'];
    protected array $translatable = ["full_name"];

}
