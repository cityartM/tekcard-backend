<?php

namespace Modules\Plan\Http\Resources;

use App\Http\Resources\CurrenciesResource;
use App\Http\Resources\PermissionResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Feature\Http\Resources\FeatureResource;
use Spatie\QueryBuilder\AllowedInclude;

class UserPlanResource extends JsonResource
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
            'display_name' =>  $this->display_name,
            'type' =>  $this->type,
            'duration' =>  $this->duration,
            'purchase_date' =>  $this->purchase_date,
            'expired_date' =>  $this->expired_date,
            'price' =>  $this->price,
            'nbr_user' =>  $this->nbr_user,
            'nbr_card_user' =>  $this->nbr_card_user,
            'features' => collect($this->features),//FeatureResource::Collection(collect($this->features)),
        ];
    }

}
