<?php

namespace Modules\Card\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Modules\Company\Models\Company;
use Modules\Card\Models\Card;


class CardOrder extends Model
{
    protected $table = 'order_cards';

    protected $fillable = [
        'card_id',
        'quantity',
        'color',
        'company_id',
        'status'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function card()
    {
        return $this->belongsTo(Card::class, 'card_id');
    }
}
