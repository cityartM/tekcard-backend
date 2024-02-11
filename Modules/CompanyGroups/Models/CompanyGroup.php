<?php

namespace Modules\CompanyGroups\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Company\Models\Company;

class CompanyGroup extends Model
{
    protected $table = 'company_groups';

    protected $fillable = ['display_name', 'user_id','company_id'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
