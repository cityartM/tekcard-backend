<?php

namespace Modules\Plan\Models;

use App\Models\Permission;
use App\Models\User;
use App\Support\Authorization\AuthorizationRoleTrait;
use App\Traits\HasGoogleTranslationTrait;
use Illuminate\Database\Eloquent\Model;


class Plan extends Model
{
    use AuthorizationRoleTrait ,HasGoogleTranslationTrait;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'plans';

    protected array $translatable = ["display_name"];

    protected $casts = [
        'removable' => 'boolean',
        'has_dashboard' => 'boolean'
    ];

    protected $fillable = ['type','name', 'display_name','price','nbr_user','nbr_card_user','has_dashboard','removable'];

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
        return $this->belongsToMany(Permission::class, 'feature_plan', 'plan_id');
    }


}
