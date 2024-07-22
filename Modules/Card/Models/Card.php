<?php

namespace Modules\Card\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Background\Models\Background;
use Modules\Company\Models\Company;
use Modules\Company\Models\CompanyCardContact;
use Modules\GlobalSetting\Models\SettingContact;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Card extends Model implements HasMedia
{
    use HasFactory ,InteractsWithMedia;

    protected $fillable = ['reference','reference_link','type','name', 'full_name', 'company_name', 'company_id', 'job_title', 'background_id',
                            'color','color_icon','color_qr','is_single_link', 'single_link_contact_id','is_main',
                            'email','phone', 'url_web_site', 'iban', 'lat', 'lon', 'address', 'note', 'user_id'
                          ];

    protected $casts = [
        'is_single_link' => 'boolean',
        'is_main' => 'boolean',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function background()
    {
        return $this->belongsTo(Background::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function cardApps()
    {
        return $this->belongsToMany(CardApps::class, 'card_apps', 'card_id', 'contact_id')
            ->withPivot('title', 'value');
    }

    public function contactApps() {
        return $this->hasMany(CardApps::class);
    }


    public function cardContacts()
    {
        return $this->hasMany(CardContact::class);
    }

    protected static function newFactory()
    {
        return \Modules\Card\Database\factories\CardFactory::new();
    }

    public function singleLink()
    {
        return $this->belongsTo(SettingContact::class, 'single_link_contact_id');
    }

    public function CompanyCardContacts()
    {
        return $this->hasMany(CompanyCardContact::class);
    }

    public function cardStatistics()
    {
        return $this->hasMany(CardStatistic::class);
    }

    public function incrementAttribute($attribute, $value = 1)
    {
        $this->$attribute += $value;
        return $this->save();
    }

}
