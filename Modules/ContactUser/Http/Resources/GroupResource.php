<?php

namespace Modules\ContactUser\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'company' =>  $this->company,
        ];
    }

}
