<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 */
class TokenDevice extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = ['device_id', 'device_token','device_name','brand','app_version','os','user_id'];
}
