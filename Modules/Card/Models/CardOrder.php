<?php

namespace Modules\Card\Models;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentJsonRelations\HasJsonRelationships;
use Staudenmeir\EloquentJsonRelations\Relations\BelongsToJson;
use Modules\Company\Models\Company;
use Modules\Card\Models\Card;


class CardOrder extends Model
{
    use HasJsonRelationships;
    protected $table = 'order_cards';

    protected $fillable = [
        'card_id',
        'quantity',
        'color',
        'company_id',
        'status'
    ];

    protected $casts = [
        'card_ids' => 'array'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }


    public function cards() :belongsToJson
    {
        return $this->belongsToJson(Card::class, 'card_ids[]->card_id');
    }

}
