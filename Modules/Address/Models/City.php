<?php

namespace Modules\Address\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;
use App\Traits\HasGoogleTranslationTrait;

class City extends Model
{
    use HasFactory;
    use HasGoogleTranslationTrait;
    protected $table = 'cities';
    protected $fillable = ['name', 'wilaya_id', 'lat', 'lon'];
    protected array $translatable = ["name"];

    public function wilaya()
    {
        return $this->belongsTo(Wilaya::class);
    }

    protected static function newFactory()
    {
        return \Modules\Address\Database\factories\CityFactory::new();
    }
}
