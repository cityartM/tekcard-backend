<?php

namespace Modules\Plan\Models;

use App\Models\Permission;
use App\Models\User;
use App\Support\Authorization\AuthorizationRoleTrait;
use App\Traits\HasGoogleTranslationTrait;
use Illuminate\Database\Eloquent\Model;
use Modules\Feature\Models\Feature;
use Modules\Plan\Support\PlanTrait;


class Plan extends Model
{
    use PlanTrait ,HasGoogleTranslationTrait;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'plans';

    protected array $translatable = ["display_name"];

    protected $casts = [
        'removable' => 'boolean',
        'has_dashboard' => 'boolean',
        'has_video'=> 'boolean',
        'has_pdf'=> 'boolean',
        'has_multiple_image'=> 'boolean',
        'has_water_mark'=> 'boolean',
        'has_share_offline'=> 'boolean',
        'share_with_image'=> 'boolean',
        'has_scan_ia'=> 'boolean',
        'has_group_contact'=> 'boolean',
        'has_scan_location'=> 'boolean',
        'has_note_contact'=> 'boolean',
        'has_statistic'=> 'boolean',
    ];

    protected $fillable = ['type','name', 'display_name','price','nbr_user','nbr_card_user','has_dashboard','has_video','has_pdf',
    'has_multiple_image','has_water_mark','has_share_offline','share_with_image','has_scan_ia',
    'has_group_contact','has_scan_location','has_note_contact','has_statistic','removable'];

    public function users()
    {
        return $this->hasMany(User::class, 'plan_id');
    }

    /**
     * Many-to-Many relations with the feature model.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function features()
    {
        return $this->belongsToMany(Feature::class, 'feature_plan', 'plan_id');
    }


}
