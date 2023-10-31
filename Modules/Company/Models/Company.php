<?php

namespace Modules\Company\Models;

use App\Models\Follower;
use App\Models\User;
use App\Traits\HasGoogleTranslationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Modules\Address\Models\City;
use Modules\Address\Models\Country;
use Modules\Ads\Enum\AdsStatus;
use Modules\Ads\Models\Ad;
use Modules\Subscriptions\Models\UserSubscription;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use \Staudenmeir\EloquentHasManyDeep\HasRelationships;


/**
 *
 */
class Company extends Model implements HasMedia
{

    use HasFactory,HasGoogleTranslationTrait,InteractsWithMedia;

    public $timestamps = true;

    protected $translatable = ['name','bio'];

    protected $fillable = ['status','full_name','job_title','phone','bio','country_id','address','avatar'];

    protected $casts = [
        'bio' => 'array',
    ];

    public function contry()
    {
        return $this->belongsTo(Country::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

}
