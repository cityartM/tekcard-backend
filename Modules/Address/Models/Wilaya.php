<?php

namespace Modules\Address\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;
use App\Traits\HasGoogleTranslationTrait;

class Wilaya extends Model
{
    use HasGoogleTranslationTrait;

    public $translatable = ['name'];

    protected $table = 'wilayas';

    protected $fillable = ['name','delivery_price' ,'country_id', 'lat', 'lon','code'];

    protected $casts = [
        'name' => 'array',
    ];
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->hasMany(City::class);
    }

    protected static function newFactory()
    {
        return \Modules\Address\Database\factories\WilayaFactory::new();
    }
}
