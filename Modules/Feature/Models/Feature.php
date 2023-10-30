<?php

namespace Modules\Feature\Models;

use App\Models\Permission;
use App\Models\User;
use App\Support\Authorization\AuthorizationRoleTrait;
use App\Traits\HasGoogleTranslationTrait;
use Illuminate\Database\Eloquent\Model;


class Feature extends Model
{
    use AuthorizationRoleTrait ,HasGoogleTranslationTrait;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'features';

    protected array $translatable = ["display_name"];

    protected $casts = [
        'removable' => 'boolean',
    ];

    protected $fillable = ['name', 'display_name','removable'];

    public function users()
    {
        return $this->hasMany(User::class, 'user_id');
    }


}
