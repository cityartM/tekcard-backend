<?php

namespace Modules\Company\Models;


use App\Models\User;
use App\Presenters\Traits\Presentable;
use App\Traits\HasGoogleTranslationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Address\Models\Country;
use Modules\Card\Models\Card;
use Modules\Company\Presenters\CompanyPresenter;
use Modules\ContactUser\Models\Group;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;



/**
 *
 */
class Company extends Model implements HasMedia
{

    use HasGoogleTranslationTrait,InteractsWithMedia,Presentable;

    protected $presenter = CompanyPresenter::class;

    public $timestamps = true;

    protected $translatable = ['name','bio'];

    protected $fillable = ['status','full_name','job_title','phone','bio','country_id','address','avatar'];

    protected $casts = [
        'bio' => 'array',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function users()
    {
        return $this->hasMany(User::class,'company_id','id');
    }

    public function cards()
    {
        return $this->hasMany(Card::class,'company_id','id');
    }

    public function groups()
    {
        return $this->hasMany(Group::class,'company_id','id');
    }

}
