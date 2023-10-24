<?php

namespace Modules\ContactUser\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';

    protected $fillable = ['display_name', 'user_id'];

    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
