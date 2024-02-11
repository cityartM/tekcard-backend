<?php

namespace Modules\CompanyGroups\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyGroupResource extends JsonResource
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
            'display_name' => $this->display_name,
            'company_id' =>  $this->company_id,
        ];
    }
}