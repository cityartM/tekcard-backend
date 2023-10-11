<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Notification extends Model
{
    protected $table = 'notifications';

    protected $fillable = ['notifiable_type', 'notifiable_id','data', 'read_at','office_id','receiving_office_id'];

    protected $casts = [
        'readable'=>'boolean',
    ];

    public function notifiable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}

