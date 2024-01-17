<?php

namespace Modules\Card\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Address\Transformers\CountryResource;
use Modules\Background\Http\Resources\BackgroundResource;
use Modules\Company\Http\Resources\CompanyResource;

class ShippingResource extends JsonResource
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
            'country' =>  new CountryResource($this->country),
            'state' =>  $this->state,
            'zip_code' =>  $this->zip_code,
            'address' =>  $this->address,
            'is_main' =>  $this->is_main,
        ];
    }

}

