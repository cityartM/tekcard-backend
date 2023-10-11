<?php

namespace App\Models;

use App\Support\Authorization\AuthorizationRoleTrait;
use Illuminate\Database\Eloquent\Model;


class Social extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $timestamps = false;

    protected $table = 'social_logins';


    protected $fillable = ['user_id', 'provider', 'provider_id','avatar','created_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
