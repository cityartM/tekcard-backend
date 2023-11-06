<?php

namespace App\Models;

use App\Support\Authorization\AuthorizationUserTrait;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Mail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Presenters\Traits\Presentable;
use App\Presenters\UserPresenter;
use App\Support\Enum\UserStatus;
use Laravel\Sanctum\HasApiTokens;
use Modules\Card\Models\Card;
use Modules\Company\Models\Company;
use Modules\Plan\Models\Plan;
use Modules\Plan\Models\UserPlan;
use Modules\Subscription\Models\Subscription;


class User extends Authenticatable
{
    use AuthorizationUserTrait ,Notifiable ,Presentable,HasApiTokens;


    protected $presenter = UserPresenter::class;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['company_id',
        'email', 'password', 'username', 'first_name', 'last_name', 'phone', 'avatar','gender',
        'address', 'birthday', 'last_login', 'confirmation_token', 'status',
        'remember_token','token_notification', 'role_id', 'email_verified_at',
        'enable_sms_notification','enable_firebase_notification', 'enable_vibrations', 'lang', 'app_version', 'device_token', 'city_id',
        'free_days','device_id','device_token','device_name','brand','os','app_version','timezone','socialite'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * Always encrypt password when it is updated.
     *
     * @param $value
     * @return string
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }


    public function gravatar()
    {
        $hash = hash('md5', strtolower(trim($this->attributes['email'])));

        return sprintf(url("assets/img/man.png"), $hash);
        //return sprintf("https://www.gravatar.com/avatar/%s?size=150", $hash);
    }

    public function isBanned()
    {
        return $this->status == UserStatus::BANNED;
    }


    /**
     * Send the password reset notification.
     *
     * @param string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        Mail::to($this)->send(new \App\Mail\ResetPassword($token));

    }

    /**
     * @param $device_id
     * @return void
     */
    public function deleteTokenDevice($device_id)
    {
        TokenDevice::query()->where([
            'user_id'=>auth()->user()->id,
            'device_id' => $device_id
        ])->first()->delete();

    }

    public function plan()
    {
      return $this->hasMany(UserPlan::class,'user_id')->where('expired_date', '>', Carbon::now());
    }

    public function plans()
    {
        return $this->hasOne(Plan::class) ;
    }

    public function notifications()
    {
        return $this->morphMany(Notification::class, 'notifiable');
    }

    public function hasSubscription()
    {
        return $this->hasOne(Subscription::class,'user_id');
    }

    public function social()
    {
        return $this->hasOne(Social::class,'user_id');
    }

    /**
     * @return BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }


    public function cards()
    {
        return $this->hasMany(Card::class,'user_id');
    }

}
