<?php

namespace Modules\Card\Http\Resources;

use App\Http\Resources\CurrenciesResource;
use App\Http\Resources\PermissionResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Background\Http\Resources\BackgroundResource;
use Modules\Company\Http\Resources\CompanyResource;
use Spatie\QueryBuilder\AllowedInclude;

class CardResource extends JsonResource
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
            'qrCode' => encrypt($this->id),
            'name' => $this->name,
            'full_name' =>  $this->full_name,
            'company_name' =>  $this->company_name,
            'company' =>  $this->company_id != null ? new CompanyResource($this->company) : null,
            'job_title' =>  $this->job_title,
            'background' =>  new BackgroundResource($this->background),
            'color' =>  $this->color,
            'is_single_link' =>  $this->is_single_link,
            'single_link_contact_id' =>  $this->single_link_contact_id,
        ];
    }

}

