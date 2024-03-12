<?php

namespace Modules\Card\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardStatistic extends Model
{
    use HasFactory ;

    protected $fillable = ['type','card_id'];


    public function card() {
        return $this->belongsTo(Card::class);
    }

}
