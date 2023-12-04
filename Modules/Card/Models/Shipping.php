<?php

namespace Modules\Card\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Address\Models\Country;
use Modules\Background\Models\Background;
use Modules\Company\Models\Company;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Shipping extends Model
{
    protected $table = 'shipping';

    protected $fillable = ['state','zip_code', 'address', 'is_main', 'country_id', 'user_id'];

    protected $casts = [
        'is_main' => 'boolean',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }


}
