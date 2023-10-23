<?php

namespace Modules\ContactUser\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Remark extends Model
{
    protected $table = 'remarks';

    protected $fillable = ['title', 'color', 'user_id'];

    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
