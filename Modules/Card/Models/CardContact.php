<?php

namespace Modules\Card\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Background\Models\Background;
use Modules\Company\Models\Company;
use Modules\ContactUser\Models\Remark;
use Modules\GlobalSetting\Models\SettingContact;

class CardContact extends Model
{
    use HasFactory ;

    protected $fillable = ['user_id','card_id', 'remark_id'];


    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    public function remark()
    {
        return $this->belongsTo(Remark::class);
    }


}
