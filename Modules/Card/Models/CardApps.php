<?php

namespace Modules\Card\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Background\Models\Background;
use Modules\Company\Models\Company;
use Modules\GlobalSetting\Models\SettingContact;

class CardApps extends Model
{
    use HasFactory ;

    protected $fillable = ['card_id','contact_id', 'title', 'value'];


    public function cards() {
        return $this->belongsToMany(Card::class, 'card_contact', 'contact_id', 'card_id');
    }

    public function app()
    {
        return $this->belongsTo(SettingContact::class, 'contact_id');
    }

}
