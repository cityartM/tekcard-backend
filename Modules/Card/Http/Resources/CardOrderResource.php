<?php

namespace Modules\Card\Http\Resources;

use App\Http\Resources\CurrenciesResource;
use App\Http\Resources\PermissionResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Background\Http\Resources\BackgroundResource;
use Modules\Company\Http\Resources\CompanyResource;
use Spatie\QueryBuilder\AllowedInclude;

class CardOrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => (int) $this->id,
            'card_id' => CardResource::collection($this->cards),
            'quantity' => $this->quantity,
            'color' =>  $this->color,
            'company' =>  $this->company_id != null ? new CompanyResource($this->company) : null,
        ];
    }

}

