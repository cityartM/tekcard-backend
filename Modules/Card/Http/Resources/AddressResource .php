<?php

namespace Modules\Card\Http\Resources;

use App\Http\Resources\CurrenciesResource;
use App\Http\Resources\PermissionResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Background\Http\Resources\BackgroundResource;
use Modules\Company\Http\Resources\CompanyResource;
use Spatie\QueryBuilder\AllowedInclude;

class AddressResource  extends JsonResource
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
            'is_main' => $this->is_main,
            'user_id' => $this->user_id,
            'country_id' => $this->country_id,
            'state' => $this->state,
            'zip_code' => $this->zip_code,
            'address' => $this->address,
        ];
    }
}

