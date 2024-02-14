<?php

namespace Modules\ContactUser\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Card\Http\Resources\CardResource;
use Modules\Company\Http\Resources\CompanyCardContactResource;
use Modules\Company\Http\Resources\CompanyResource;

class GroupResource extends JsonResource
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
            'bio' =>  $this->bio,
            //'cards' => CompanyCardContactResource::collection($this->companyCardContacts),
            'cards' => CardResource::collection($this->cards),
            //'company' =>  new CompanyResource($this->company),
        ];
    }

}
