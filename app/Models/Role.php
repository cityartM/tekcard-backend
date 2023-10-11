<?php

namespace App\Models;

use App\Support\Authorization\AuthorizationRoleTrait;
use Illuminate\Database\Eloquent\Model;


class Role extends Model
{
    use AuthorizationRoleTrait;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';

    protected $casts = [
        'removable' => 'boolean'
    ];

    protected $fillable = ['name', 'display_name', 'description'];

    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }

    /**
     * Many-to-Many relations with the permission model.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_role', 'role_id');
    }


}
