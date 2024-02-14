<?php

namespace Modules\ContactUser\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Company\Models\Company;

class Group extends Model
{
    protected $table = 'groups';

    protected $fillable = ['display_name','company_id','bio','user_id'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
