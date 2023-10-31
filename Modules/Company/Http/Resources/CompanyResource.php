<?php

namespace Modules\Company\Http\Resources;

use App\Http\Resources\CurrenciesResource;
use App\Http\Resources\PermissionResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Address\Transformers\CountryResource;
use Spatie\QueryBuilder\AllowedInclude;

class CompanyResource extends JsonResource
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
            'full_name' => $this->full_name,
            'status' => $this->status,
            'job_title' => $this->job_title,
            'phone' => $this->phone,
            'bio' => $this->bio,
            'country' => new CountryResource($this->country),
            'address' => $this->address,
            'avatar' => $this->present()->avatar,
        ];
    }

}
