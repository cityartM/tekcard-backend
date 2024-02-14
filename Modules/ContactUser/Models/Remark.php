<?php

namespace Modules\ContactUser\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Card\Models\CardContact;
use Modules\Company\Models\CompanyCardContact;


class Remark extends Model
{
    protected $table = 'remarks';

    protected $fillable = ['title', 'color', 'user_id'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function remarkContacts()
    {
        return $this->hasMany(CardContact::class);
    }

    public function remarkCompanyContacts()
    {
        return $this->hasMany(CompanyCardContact::class);
    }
}
