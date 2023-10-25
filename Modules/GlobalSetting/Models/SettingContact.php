<?php

namespace Modules\GlobalSetting\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Models\User;

class SettingContact extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'setting_contacts';

    protected $fillable = ['user_id', 'display_name', 'value', 'category'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
