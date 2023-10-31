<?php

namespace Modules\Plan\Models;

use App\Helpers\Helper;
use App\Models\Permission;
use App\Models\User;
use App\Support\Authorization\AuthorizationRoleTrait;
use App\Traits\HasGoogleTranslationTrait;
use Illuminate\Database\Eloquent\Model;
use Modules\Feature\Models\Feature;
use Modules\Plan\Support\PlanTrait;
use Spatie\Translatable\HasTranslations;


class UserPlan extends Model
{
   // use HasGoogleTranslationTrait;
    use HasTranslations;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_plans';

    protected array $translatable = ["display_name"];

    protected $casts = [
        'has_dashboard' => 'boolean',
        'features' => 'array',
    ];

    protected $fillable = ['type','name', 'display_name','price','nbr_user','nbr_card_user','has_dashboard','duration','purchase_date','expired_date','features','user_id','plan_id'];


    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }


}
