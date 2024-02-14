<?php

namespace Modules\Company\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Card\Models\Card;
use Modules\ContactUser\Models\Remark;

class CompanyCardContact extends Model
{
    use HasFactory ;

    protected $fillable = ['user_id','company_id','card_id', 'remark_id','group_id'];


    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    public function remark()
    {
        return $this->belongsTo(Remark::class);
    }

}
