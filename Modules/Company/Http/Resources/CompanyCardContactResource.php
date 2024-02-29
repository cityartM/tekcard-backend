<?php

namespace Modules\Company\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Card\Http\Resources\CardResource;
use Modules\ContactUser\Http\Resources\GroupResource;
use Modules\ContactUser\Http\Resources\RemarkResource;

class CompanyCardContactResource extends JsonResource
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
            'card' => new CardResource($this->card),
            'remark' => new RemarkResource($this->remark),
            'group' => new GroupResource($this->group),
        ];
    }

}

