<?php

namespace Modules\Address\Models;

use App\Traits\HasGoogleTranslationTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use HasGoogleTranslationTrait;
    protected $table = 'countries';
    protected $fillable = ['name', 'display','country_code','currency_code','calling_code','delivery_price'];
    protected array $translatable = ["full_name", "name"];

    protected $casts = [
        'name' => 'json',
        "display" => 'boolean',
    ];

}
