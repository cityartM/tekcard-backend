<?php

namespace Modules\Plan\Http\Resources;

use App\Http\Resources\CurrenciesResource;
use App\Http\Resources\PermissionResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Feature\Http\Resources\FeatureResource;
use Spatie\QueryBuilder\AllowedInclude;

class PlanResource extends JsonResource
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
            'name' => $this->name,
            'display_name' =>  $this->display_name,
            'type' =>  $this->type,
            'price' =>  $this->price,
            'nbr_user' =>  $this->nbr_user,
            'nbr_card_user' =>  $this->nbr_card_user,
            'features' => FeatureResource::Collection($this->features),
        ];
    }

}
